<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NaturalResource;
use Illuminate\Http\Request;

class NaturalResourceController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => NaturalResource::count(),
            'lahan' => NaturalResource::where('category', 'lahan')->count(),
            'air' => NaturalResource::where('category', 'air')->count(),
            'hutan' => NaturalResource::where('category', 'hutan')->count(),
        ];
        return view('admin.natural-resources.index', compact('stats'));
    }

    public function getData(Request $request)
    {
        $query = NaturalResource::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Sort
        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'desc');
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
                    'name' => $row->name,
                    'category' => $row->category,
                    'category_label' => $row->category_label,
                    'type' => $row->type,
                    'area_size' => $row->area_size,
                    'unit' => $row->unit,
                    'condition' => $row->condition,
                    'description' => $row->description,
                    'status' => $row->is_active
                        ? '<span class="badge badge-success">Aktif</span>'
                        : '<span class="badge badge-secondary">Nonaktif</span>',
                    'action' => '
                        <button class="btn btn-sm btn-info btn-edit" data-id="' . $row->id . '" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-warning btn-toggle" data-id="' . $row->id . '" title="Toggle Status">
                            <i class="fas fa-power-off"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
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
            'category' => 'required|in:lahan,air,mineral,mesin,hutan,lainnya',
        ]);

        NaturalResource::create($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan']);
    }

    public function show($id)
    {
        $resource = NaturalResource::findOrFail($id);
        return response()->json($resource);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:lahan,air,mineral,mesin,hutan,lainnya',
        ]);

        $resource = NaturalResource::findOrFail($id);
        $resource->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $resource = NaturalResource::findOrFail($id);
        $resource->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

    public function toggleStatus($id)
    {
        $resource = NaturalResource::findOrFail($id);
        $resource->is_active = !$resource->is_active;
        $resource->save();

        return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
    }
}
