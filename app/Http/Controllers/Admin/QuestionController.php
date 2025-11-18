<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChecklistMasalahQuestion;
use App\Models\PTSDQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied at route level
    }

    public function index()
    {
        return view('admin.questions.index');
    }

    public function getQuestions(Request $request)
    {
        if ($request->ajax()) {
            $query = ChecklistMasalahQuestion::query();

            // Search
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('question', 'like', "%{$search}%");
            }

            // Sort
            $sortBy = $request->input('sort_by', 'order_number');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);

            // Pagination
            $perPage = $request->input('per_page', 10);
            $page = $request->input('page', 1);
            $total = $query->count();
            $results = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

            return response()->json([
                'data' => $results->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'question' => $row->question,
                        'category' => $row->category_name,
                        'order_number' => $row->order_number,
                        'action' => '<div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-info btn-view" data-id="' . $row->id . '" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-edit" data-id="' . $row->id . '" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-delete" data-id="' . $row->id . '" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>'
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

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'category' => 'required|integer|min:1|max:5',
            'category_name' => 'required|string',
            'order_number' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        ChecklistMasalahQuestion::create($request->all());

        return response()->json(['success' => 'Question created successfully']);
    }

    public function show($id)
    {
        $question = ChecklistMasalahQuestion::findOrFail($id);
        return response()->json($question);
    }

    public function edit($id)
    {
        $question = ChecklistMasalahQuestion::findOrFail($id);
        return response()->json($question);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'category' => 'required|integer|min:1|max:5',
            'category_name' => 'required|string',
            'order_number' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question = ChecklistMasalahQuestion::findOrFail($id);
        $question->update($request->all());

        return response()->json(['success' => 'Question updated successfully']);
    }

    public function destroy($id)
    {
        $question = ChecklistMasalahQuestion::findOrFail($id);
        $question->delete();
        return response()->json(['success' => 'Question deleted successfully']);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        ChecklistMasalahQuestion::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'Questions deleted successfully']);
    }

    public function toggleStatus($id)
    {
        // Implementation for toggle status
        return response()->json(['success' => 'Status toggled successfully']);
    }

    public function import(Request $request)
    {
        // Implementation for import
        return response()->json(['success' => 'Import feature coming soon']);
    }

    public function export()
    {
        // Implementation for export
        return response()->json(['success' => 'Export feature coming soon']);
    }

    // PTSD Questions methods
    public function PTSDIndex()
    {
        return view('admin.questions.ptsd-index');
    }

    public function getPTSDQuestions(Request $request)
    {
        if ($request->ajax()) {
            $query = PTSDQuestion::query();

            // Search
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('question_text', 'like', "%{$search}%");
            }

            // Sort
            $sortBy = $request->input('sort_by', 'order');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);

            // Pagination
            $perPage = $request->input('per_page', 10);
            $page = $request->input('page', 1);
            $total = $query->count();
            $results = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

            return response()->json([
                'data' => $results->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'question_text' => $row->question_text,
                        'order' => $row->order,
                        'is_active' => $row->is_active,
                        'action' => '<div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-info btn-view" data-id="' . $row->id . '" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-edit" data-id="' . $row->id . '" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-delete" data-id="' . $row->id . '" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>'
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

    public function PTSDStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string',
            'order' => 'required|integer|min:1',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question = PTSDQuestion::create([
            'question_text' => $request->question_text,
            'order' => $request->order ?? PTSDQuestion::max('order') + 1,
            'is_active' => $request->is_active ?? true,
        ]);

        return response()->json(['success' => 'PTSD Question created successfully', 'id' => $question->id]);
    }

    public function PTSDShow($id)
    {
        $question = PTSDQuestion::findOrFail($id);
        return response()->json($question);
    }

    public function PTSDEdit($id)
    {
        $question = PTSDQuestion::findOrFail($id);
        return response()->json($question);
    }

    public function PTSDUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string',
            'order' => 'required|integer|min:1',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question = PTSDQuestion::findOrFail($id);
        $question->update([
            'question_text' => $request->question_text,
            'order' => $request->order,
            'is_active' => $request->is_active ?? $question->is_active,
        ]);

        return response()->json(['success' => 'PTSD Question updated successfully']);
    }

    public function PTSDestroy($id)
    {
        $question = PTSDQuestion::findOrFail($id);
        $question->delete();
        return response()->json(['success' => 'PTSD Question deleted successfully']);
    }
}