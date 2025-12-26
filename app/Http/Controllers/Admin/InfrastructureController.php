<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Infrastructure::count(),
            'jalan' => Infrastructure::where('category', 'jalan')->count(),
            'listrik' => Infrastructure::where('category', 'listrik')->count(),
            'air' => Infrastructure::where('category', 'air')->count(),
        ];
        return view('admin.infrastructures.index', compact('stats'));
    }

    public function getData(Request $request)
    {
        $query = Infrastructure::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $total = $query->count();
        $results = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

        return response()->json([
            'data' => $results->map(function ($row) {
                $conditionBadge = match($row->condition) {
                    'baik' => '<span class="badge badge-success">Baik</span>',
                    'sedang' => '<span class="badge badge-warning">Sedang</span>',
                    'rusak' => '<span class="badge badge-danger">Rusak</span>',
                    default => '<span class="badge badge-secondary">-</span>',
                };
                return [
                    'id' => $row->id,
                    'name' => $row->name,
                    'category' => $row->category,
                    'category_label' => $row->category_label,
                    'type' => $row->type,
                    'condition' => $row->condition,
                    'condition_badge' => $conditionBadge,
                    'coverage_percentage' => $row->coverage_percentage,
                    'description' => $row->description,
                    'status' => $row->is_active
                        ? '<span class="badge badge-success">Aktif</span>'
                        : '<span class="badge badge-secondary">Nonaktif</span>',
                    'action' => '
                        <button class="btn btn-sm btn-info btn-edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-warning btn-toggle" data-id="' . $row->id . '"><i class="fas fa-power-off"></i></button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
                    '
                ];
            }),
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
        ]);
        Infrastructure::create($request->all());
        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(Infrastructure::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Infrastructure::findOrFail($id)->update($request->all());
        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Infrastructure::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

    public function toggleStatus($id)
    {
        $item = Infrastructure::findOrFail($id);
        $item->is_active = !$item->is_active;
        $item->save();
        return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
    }
}
