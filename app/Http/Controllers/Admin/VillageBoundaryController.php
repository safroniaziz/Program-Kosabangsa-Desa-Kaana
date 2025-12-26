<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageBoundary;
use Illuminate\Http\Request;

class VillageBoundaryController extends Controller
{
    public function index()
    {
        return view('admin.village-boundaries.index');
    }

    public function getBoundaries(Request $request)
    {
        $query = VillageBoundary::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('village_name', 'like', "%{$search}%");
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
            'data' => $results->map(function ($item) {
                $statusBadge = $item->is_active 
                    ? '<span class="badge badge-success">Aktif</span>' 
                    : '<span class="badge badge-secondary">Nonaktif</span>';
                
                $center = number_format($item->center_latitude, 6) . ', ' . number_format($item->center_longitude, 6);
                $colorPreview = '<span class="badge" style="background-color: ' . ($item->fill_color ?? '#007bff') . '; opacity: ' . ($item->fill_opacity ?? 0.3) . '; border: 2px solid ' . ($item->line_color ?? '#007bff') . '">&nbsp;&nbsp;&nbsp;</span>';
                
                $action = '<div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-primary btn-preview" data-id="' . $item->id . '" title="Preview Map">
                        <i class="fas fa-map"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-info btn-edit" data-id="' . $item->id . '" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-warning btn-toggle" data-id="' . $item->id . '" title="Toggle Status">
                        <i class="fas fa-power-off"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="' . $item->id . '" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>';

                return [
                    'id' => $item->id,
                    'village_name' => $item->village_name,
                    'center' => $center,
                    'center_latitude' => $item->center_latitude,
                    'center_longitude' => $item->center_longitude,
                    'default_zoom' => $item->default_zoom,
                    'fill_color' => $item->fill_color,
                    'fill_opacity' => $item->fill_opacity,
                    'line_color' => $item->line_color,
                    'line_width' => $item->line_width,
                    'coordinates' => $item->coordinates,
                    'color_preview' => $colorPreview,
                    'is_active' => $item->is_active,
                    'status' => $statusBadge,
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

    public function store(Request $request)
    {
        $request->validate([
            'village_name' => 'required|string|max:255',
            'coordinates' => 'required|json',
            'center_latitude' => 'required|numeric',
            'center_longitude' => 'required|numeric',
            'default_zoom' => 'nullable|integer|min:1|max:20',
            'fill_color' => 'nullable|string|max:50',
            'fill_opacity' => 'nullable|numeric|min:0|max:1',
            'line_color' => 'nullable|string|max:50',
            'line_width' => 'nullable|integer|min:1|max:10',
        ]);

        $data = $request->all();
        $data['coordinates'] = json_decode($request->coordinates, true);
        $data['is_active'] = $request->has('is_active');
        $data['default_zoom'] = $data['default_zoom'] ?? 14;
        $data['fill_opacity'] = $data['fill_opacity'] ?? 0.3;
        $data['line_width'] = $data['line_width'] ?? 2;

        VillageBoundary::create($data);

        return response()->json(['success' => 'Batas wilayah berhasil ditambahkan!']);
    }

    public function show($id)
    {
        $boundary = VillageBoundary::findOrFail($id);
        return response()->json($boundary);
    }

    public function update(Request $request, $id)
    {
        $boundary = VillageBoundary::findOrFail($id);

        $request->validate([
            'village_name' => 'required|string|max:255',
            'coordinates' => 'required',
            'center_latitude' => 'required|numeric',
            'center_longitude' => 'required|numeric',
            'default_zoom' => 'nullable|integer|min:1|max:20',
            'fill_color' => 'nullable|string|max:50',
            'fill_opacity' => 'nullable|numeric|min:0|max:1',
            'line_color' => 'nullable|string|max:50',
            'line_width' => 'nullable|integer|min:1|max:10',
        ]);

        $data = $request->all();
        if (is_string($request->coordinates)) {
            $data['coordinates'] = json_decode($request->coordinates, true);
        }
        $data['is_active'] = $request->has('is_active');

        $boundary->update($data);

        return response()->json(['success' => 'Batas wilayah berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $boundary = VillageBoundary::findOrFail($id);
        $boundary->delete();

        return response()->json(['success' => 'Batas wilayah berhasil dihapus!']);
    }

    public function toggleStatus($id)
    {
        $boundary = VillageBoundary::findOrFail($id);
        $boundary->is_active = !$boundary->is_active;
        $boundary->save();

        $status = $boundary->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return response()->json(['success' => "Batas wilayah berhasil {$status}!"]);
    }
}
