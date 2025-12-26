<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DcmAssessmentResult;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DcmAssessmentResultController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => DcmAssessmentResult::count(),
            'fisik' => DcmAssessmentResult::where('dominant_category', 1)->count(),
            'emosi' => DcmAssessmentResult::where('dominant_category', 2)->count(),
            'mental' => DcmAssessmentResult::where('dominant_category', 3)->count(),
            'perilaku' => DcmAssessmentResult::where('dominant_category', 4)->count(),
            'spiritual' => DcmAssessmentResult::where('dominant_category', 5)->count(),
        ];
        
        return view('admin.dcm-results.index', compact('stats'));
    }

    public function getResults(Request $request)
    {
        $results = DcmAssessmentResult::with('user')
            ->orderBy('created_at', 'desc');

        // Filter by dominant category
        if ($request->has('category') && $request->category !== 'all') {
            $results->where('dominant_category', $request->category);
        }

        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return $row->user->name ?? 'N/A';
            })
            ->addColumn('category_badge', function ($row) {
                $badges = [
                    1 => '<span class="badge badge-danger">Fisik</span>',
                    2 => '<span class="badge badge-warning">Emosi</span>',
                    3 => '<span class="badge badge-info">Mental</span>',
                    4 => '<span class="badge badge-primary">Perilaku</span>',
                    5 => '<span class="badge badge-success">Spiritual</span>',
                ];
                return $badges[$row->dominant_category] ?? '<span class="badge badge-secondary">-</span>';
            })
            ->addColumn('scores_display', function ($row) {
                $scores = $row->category_scores ?? [];
                $html = '<div class="d-flex gap-1">';
                $labels = ['F', 'E', 'M', 'P', 'S'];
                foreach ($scores as $cat => $score) {
                    $html .= '<span class="badge badge-light">' . $labels[$cat - 1] . ':' . $score . '</span>';
                }
                $html .= '</div>';
                return $html;
            })
            ->addColumn('created', function ($row) {
                return $row->created_at->format('d/m/Y H:i');
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-info btn-view" data-id="' . $row->id . '" title="Detail">
                        <i class="fas fa-eye"></i>
                    </button>
                ';
            })
            ->rawColumns(['category_badge', 'scores_display', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $result = DcmAssessmentResult::with('user')->findOrFail($id);
        $interpretation = $result->getInterpretation();
        return response()->json([
            'result' => $result,
            'interpretation' => $interpretation
        ]);
    }
}
