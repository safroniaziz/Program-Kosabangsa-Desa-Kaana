<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAssessment;
use App\Models\User;
use Illuminate\Http\Request;

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
        if ($request->ajax()) {
            $query = UserAssessment::with('user')
                ->select('user_assessments.*');

            // Search
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            }

            // Filters
            if ($request->filled('type')) {
                $query->where('assessment_type', $request->input('type'));
            }

            if ($request->filled('risk_level')) {
                $query->where('risk_level', $request->input('risk_level'));
            }

            // Sort
            $sortBy = $request->input('sort_by', 'created_at');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // Pagination
            $perPage = $request->input('per_page', 10);
            $page = $request->input('page', 1);
            $total = $query->count();
            $results = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

            return response()->json([
                'data' => $results->map(function ($assessment) {
                    return [
                        'id' => $assessment->id,
                        'user_name' => $assessment->user->name ?? 'N/A',
                        'assessment_type' => $assessment->assessment_type,
                        'risk_level' => $assessment->risk_level,
                        'total_score' => $assessment->total_score,
                        'created_at' => $assessment->created_at->format('Y-m-d H:i')
                    ];
                }),
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'from' => ($page - 1) * $perPage + 1,
                'to' => min($page * $perPage, $total)
            ]);
        }
    }

    public function show($id)
    {
        $assessment = UserAssessment::with('user')->findOrFail($id);
        return view('admin.assessments.show', compact('assessment'));
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