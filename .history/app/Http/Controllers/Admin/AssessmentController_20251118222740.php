<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAssessment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied at route level
    }

    public function index()
    {
        return view('admin.assessments.index-custom');
    }

    public function getAssessments(Request $request)
    {
        // Handle both AJAX and regular requests
        // Group by user_id and assessment_type, get latest for each combination
        $baseQuery = UserAssessment::with('user')
            ->select('user_assessments.*')
            ->where('status', 'completed');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $baseQuery->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filters
        if ($request->filled('type') && $request->input('type') !== '') {
            $type = $request->input('type');
            // Map 'dcm' to 'checklist_masalah' for database compatibility
            if ($type === 'dcm') {
                $type = 'checklist_masalah';
            }
            $baseQuery->where('assessment_type', $type);
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            try {
                // Get latest assessment for each user + type combination
                // Use subquery to get max id for each user_id + assessment_type
                $subquery = UserAssessment::selectRaw('MAX(id) as id')
                    ->where('status', 'completed')
                    ->groupBy('user_id', 'assessment_type');

                // Apply filters to subquery
                if ($request->filled('search')) {
                    $search = $request->input('search');
                    $subquery->whereHas('user', function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                    });
                }

                if ($request->filled('type') && $request->input('type') !== '') {
                    $type = $request->input('type');
                    if ($type === 'dcm') {
                        $type = 'checklist_masalah';
                    }
                    $subquery->where('assessment_type', $type);
                }

                $latestIds = $subquery->pluck('id');

                // If no results, return empty
                if ($latestIds->isEmpty()) {
                    return response()->json([
                        'data' => [],
                        'total' => 0,
                        'per_page' => $request->input('per_page', 10),
                        'current_page' => $request->input('page', 1),
                        'last_page' => 0,
                        'from' => 0,
                        'to' => 0
                    ]);
                }

                // Get the actual assessments
                $latestAssessments = UserAssessment::with('user')
                    ->whereIn('id', $latestIds)
                    ->get();

            // Apply sorting
            $sortBy = $request->input('sort_by', 'created_at');
            $sortOrder = $request->input('sort_order', 'desc');

            $sorted = $latestAssessments->sortBy(function($item) use ($sortBy) {
                // Handle nested properties safely
                if (strpos($sortBy, '.') !== false) {
                    $parts = explode('.', $sortBy);
                    $value = $item;
                    foreach ($parts as $part) {
                        $value = $value->$part ?? null;
                    }
                    return $value;
                }
                return $item->$sortBy ?? null;
            });

            if ($sortOrder === 'desc') {
                $sorted = $sorted->reverse();
            }

            // Pagination
            $perPage = $request->input('per_page', 10);
            $page = $request->input('page', 1);
            $total = $sorted->count();
            $results = $sorted->skip(($page - 1) * $perPage)->take($perPage)->values();

            return response()->json([
                'data' => $results->map(function ($assessment) {
                    // Get risk_level from field or results JSON
                    $riskLevel = $assessment->risk_level;
                    if (empty($riskLevel) && $assessment->results) {
                        $results = is_array($assessment->results) ? $assessment->results : json_decode($assessment->results, true);
                        $riskLevel = $results['risk_level'] ?? $results['overall_risk_level'] ?? null;
                    }

                    // Normalize risk level (handle Indonesian values)
                    if ($riskLevel) {
                        $riskLevel = strtolower($riskLevel);
                        if (in_array($riskLevel, ['rendah', 'low', 'sangat rendah', 'very_low'])) {
                            $riskLevel = 'low';
                        } elseif (in_array($riskLevel, ['sedang', 'medium', 'moderate', 'menengah'])) {
                            $riskLevel = 'medium';
                        } elseif (in_array($riskLevel, ['tinggi', 'high', 'critical'])) {
                            $riskLevel = 'high';
                        }
                    }

                    // Get total_score from field or results JSON
                    $totalScore = $assessment->total_score;
                    if (empty($totalScore) && $assessment->results) {
                        $results = is_array($assessment->results) ? $assessment->results : json_decode($assessment->results, true);
                        $totalScore = $results['total_score'] ?? $results['total_checked'] ?? $results['total_problems'] ?? 0;
                    }

                    // Format type badge (Bootstrap 5 compatible) - Different colors for DCM and PTSD
                    $typeBadge = '';
                    if ($assessment->assessment_type === 'ptsd') {
                        $typeBadge = '<span class="badge bg-primary text-white">PTSD</span>';
                    } elseif ($assessment->assessment_type === 'checklist_masalah') {
                        $typeBadge = '<span class="badge bg-purple text-white">DCM</span>';
                    } elseif ($assessment->assessment_type === 'dcm') {
                        $typeBadge = '<span class="badge bg-purple text-white">DCM</span>';
                    } else {
                        $typeBadge = '<span class="badge bg-secondary text-white">' . strtoupper($assessment->assessment_type ?? 'N/A') . '</span>';
                    }

                    // Format risk badge (Bootstrap 5 compatible)
                    $riskBadge = '';
                    if ($riskLevel === 'low' || $riskLevel === 'very_low') {
                        $riskBadge = '<span class="badge bg-success text-white">Low</span>';
                    } elseif ($riskLevel === 'medium' || $riskLevel === 'moderate') {
                        $riskBadge = '<span class="badge bg-orange text-white">Medium</span>';
                    } elseif ($riskLevel === 'high' || $riskLevel === 'critical') {
                        $riskBadge = '<span class="badge bg-danger text-white">High</span>';
                    } else {
                        $riskBadge = '<span class="badge bg-secondary text-white">' . ucfirst($riskLevel ?? 'N/A') . '</span>';
                    }

                    // Action buttons
                    $action = '<div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-info btn-view" data-id="' . $assessment->id . '" title="View Detail">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-primary btn-history" data-user-id="' . $assessment->user_id . '" data-type="' . $assessment->assessment_type . '" title="Lihat Riwayat">
                            <i class="fas fa-history"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="' . $assessment->id . '" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>';

                    return [
                        'id' => $assessment->id,
                        'user_name' => $assessment->user->name ?? 'N/A',
                        'user_email' => $assessment->user->email ?? 'N/A',
                        'assessment_type' => $assessment->assessment_type,
                        'type_badge' => $typeBadge,
                        'risk_level' => $riskLevel,
                        'risk_badge' => $riskBadge,
                        'total_score' => $totalScore ?? 0,
                        'score' => $totalScore ?? 0,
                        'created_at' => $assessment->created_at->format('Y-m-d H:i'),
                        'action' => $action
                    ];
                })->values()->toArray(),
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'from' => ($page - 1) * $perPage + 1,
                'to' => min($page * $perPage, $total)
            ]);
            } catch (\Exception $e) {
                Log::error('AssessmentController getAssessments error: ' . $e->getMessage());
                Log::error($e->getTraceAsString());

                return response()->json([
                    'error' => 'Failed to load assessments',
                    'message' => $e->getMessage()
                ], 500);
            }
        }

        // For non-AJAX requests, return view or redirect
        return redirect()->route('admin.assessments.index');
    }

    public function show($id)
    {
        $assessment = UserAssessment::with('user')->findOrFail($id);

        // Return HTML for modal
        $html = view('admin.assessments.show-partial', compact('assessment'))->render();
        return response()->json(['html' => $html]);
    }

    public function getHistory(Request $request, $userId, $type)
    {
        // Map 'dcm' to 'checklist_masalah' for database compatibility
        if ($type === 'dcm') {
            $type = 'checklist_masalah';
        }

        $assessments = UserAssessment::with('user')
            ->where('user_id', $userId)
            ->where('assessment_type', $type)
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        // Return HTML for modal
        $html = view('admin.assessments.history-partial', compact('assessments', 'type'))->render();
        return response()->json(['html' => $html]);
    }

    public function destroy($id)
    {
        $assessment = UserAssessment::findOrFail($id);
        $assessment->delete();

        return response()->json(['success' => 'Assessment deleted successfully']);
    }

    public function ptsdIndex()
    {
        return view('admin.assessments.ptsd-index');
    }

    public function getPTSDAssessments(Request $request)
    {
        if ($request->ajax()) {
            $query = UserAssessment::with('user')
                ->where('assessment_type', 'ptsd')
                ->select('user_assessments.*');

            // Similar implementation as getAssessments
            // ...

            return response()->json([
                'data' => $query->get()->map(function ($assessment) {
                    return [
                        'id' => $assessment->id,
                        'user_name' => $assessment->user->name ?? 'N/A',
                        // ...
                    ];
                })
            ]);
        }
    }

    public function dcmIndex()
    {
        return view('admin.assessments.dcm-index');
    }

    public function getDCMAssessments(Request $request)
    {
        if ($request->ajax()) {
            $query = UserAssessment::with('user')
                ->where('assessment_type', 'dcm')
                ->select('user_assessments.*');

            // Similar implementation
            // ...

            return response()->json([
                'data' => $query->get()
            ]);
        }
    }

    public function export()
    {
        // Implementation for export
        return "Export feature coming soon";
    }

    public function history()
    {
        return view('admin.assessments.history');
    }
}
