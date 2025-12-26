<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAnswer;
use App\Models\UserAssessment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserAnswerController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => UserAnswer::count(),
            'today' => UserAnswer::whereDate('created_at', today())->count(),
            'ptsd' => UserAnswer::whereHas('userAssessment', fn($q) => $q->where('assessment_type', 'ptsd'))->count(),
            'dcm' => UserAnswer::whereHas('userAssessment', fn($q) => $q->where('assessment_type', 'checklist_masalah'))->count(),
        ];
        
        return view('admin.user-answers.index', compact('stats'));
    }

    public function getAnswers(Request $request)
    {
        $answers = UserAnswer::with(['userAssessment.user'])
            ->orderBy('created_at', 'desc');

        // Filter by assessment type
        if ($request->has('assessment_type') && $request->assessment_type !== 'all') {
            $answers->whereHas('userAssessment', fn($q) => $q->where('assessment_type', $request->assessment_type));
        }

        return DataTables::of($answers)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return $row->userAssessment->user->name ?? 'N/A';
            })
            ->addColumn('assessment_type', function ($row) {
                $type = $row->userAssessment->assessment_type ?? 'N/A';
                $badge = $type === 'ptsd' 
                    ? '<span class="badge badge-warning">PTSD</span>'
                    : '<span class="badge badge-info">DCM</span>';
                return $badge;
            })
            ->addColumn('answer_display', function ($row) {
                $value = $row->answer_value;
                if ($value === 1 || $value === '1' || $value === true) {
                    return '<span class="badge badge-success">Ya</span>';
                } elseif ($value === 0 || $value === '0' || $value === false) {
                    return '<span class="badge badge-secondary">Tidak</span>';
                }
                return $value;
            })
            ->addColumn('response_time', function ($row) {
                return $row->response_time_ms ? number_format($row->response_time_ms) . ' ms' : '-';
            })
            ->addColumn('answered', function ($row) {
                return $row->answered_at ? $row->answered_at->format('d/m/Y H:i') : '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-info btn-view" data-id="' . $row->id . '" title="Detail">
                        <i class="fas fa-eye"></i>
                    </button>
                ';
            })
            ->rawColumns(['assessment_type', 'answer_display', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $answer = UserAnswer::with(['userAssessment.user'])->findOrFail($id);
        return response()->json($answer);
    }
}
