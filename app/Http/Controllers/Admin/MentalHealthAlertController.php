<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MentalHealthAlert;
use Illuminate\Http\Request;

class MentalHealthAlertController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => MentalHealthAlert::count(),
            'active' => MentalHealthAlert::where('status', 'active')->count(),
            'critical' => MentalHealthAlert::where('severity', 'critical')->count(),
            'acknowledged' => MentalHealthAlert::where('status', 'acknowledged')->count(),
        ];
        
        return view('admin.mental-health-alerts.index', compact('stats'));
    }

    public function getAlerts(Request $request)
    {
        $query = MentalHealthAlert::with(['user', 'userAssessment', 'acknowledgedBy']);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by severity
        if ($request->has('severity') && $request->severity !== 'all') {
            $query->where('severity', $request->severity);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('alert_type', 'like', "%{$search}%");
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

        $severityColors = [
            'low' => 'info',
            'medium' => 'warning',
            'high' => 'danger',
            'critical' => 'dark',
        ];

        $statusColors = [
            'active' => 'danger',
            'acknowledged' => 'success',
            'resolved' => 'info',
            'dismissed' => 'secondary',
        ];

        return response()->json([
            'data' => $results->map(function ($item) use ($severityColors, $statusColors) {
                $severityColor = $severityColors[$item->severity] ?? 'secondary';
                $statusColor = $statusColors[$item->status] ?? 'secondary';
                
                $acknowledgedInfo = '-';
                if ($item->acknowledgedBy && $item->acknowledged_at) {
                    $acknowledgedInfo = $item->acknowledgedBy->name . '<br><small class="text-muted">' . $item->acknowledged_at->format('d M Y H:i') . '</small>';
                }
                
                $action = '<button class="btn btn-sm btn-info btn-view" data-id="' . $item->id . '" title="Detail">
                    <i class="fas fa-eye"></i>
                </button>';
                
                if ($item->status === 'active') {
                    $action .= '
                        <button class="btn btn-sm btn-success btn-acknowledge" data-id="' . $item->id . '" data-status="acknowledged" title="Acknowledge">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-sm btn-warning btn-acknowledge" data-id="' . $item->id . '" data-status="resolved" title="Resolve">
                            <i class="fas fa-check-double"></i>
                        </button>';
                }
                
                $action .= '<button class="btn btn-sm btn-danger btn-delete" data-id="' . $item->id . '" title="Hapus">
                    <i class="fas fa-trash"></i>
                </button>';

                return [
                    'id' => $item->id,
                    'user_name' => $item->user ? $item->user->name : 'N/A',
                    'alert_type' => $item->alert_type,
                    'severity' => $item->severity,
                    'severity_badge' => '<span class="badge badge-' . $severityColor . '">' . ucfirst($item->severity) . '</span>',
                    'status' => $item->status,
                    'status_badge' => '<span class="badge badge-' . $statusColor . '">' . ucfirst($item->status) . '</span>',
                    'acknowledged_info' => $acknowledgedInfo,
                    'created' => $item->created_at->format('d M Y H:i'),
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
    }

    public function show($id)
    {
        $alert = MentalHealthAlert::with(['user', 'userAssessment', 'acknowledgedBy'])
            ->findOrFail($id);
        return response()->json($alert);
    }

    public function acknowledge(Request $request, $id)
    {
        $alert = MentalHealthAlert::findOrFail($id);

        $request->validate([
            'status' => 'required|in:acknowledged,resolved,dismissed',
        ]);

        $alert->status = $request->status;
        $alert->acknowledged_by = auth()->id();
        $alert->acknowledged_at = now();
        $alert->save();

        $statusLabel = [
            'acknowledged' => 'di-acknowledge',
            'resolved' => 'diselesaikan',
            'dismissed' => 'ditolak',
        ];

        return response()->json(['success' => 'Alert berhasil ' . ($statusLabel[$request->status] ?? 'diupdate') . '!']);
    }

    public function destroy($id)
    {
        $alert = MentalHealthAlert::findOrFail($id);
        $alert->delete();

        return response()->json(['success' => 'Alert berhasil dihapus!']);
    }
}
