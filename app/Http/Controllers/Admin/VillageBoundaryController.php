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
        // Get all boundaries
        $allBoundaries = VillageBoundary::all();
        
        // Flatten all coordinates from all boundaries into a single list
        $allCoordinates = [];
        foreach ($allBoundaries as $item) {
            if ($item->coordinates && is_array($item->coordinates) && count($item->coordinates) > 0) {
                foreach ($item->coordinates as $coord) {
                    if (is_array($coord) && count($coord) >= 2) {
                        $allCoordinates[] = [
                            'latitude' => number_format($coord[1], 6),
                            'longitude' => number_format($coord[0], 6),
                        ];
                    }
                }
            }
        }
        
        // If no coordinates found, return empty array
        if (empty($allCoordinates)) {
            $allCoordinates[] = [
                'latitude' => '-',
                'longitude' => '-',
            ];
        }
        
        // Pagination
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $total = count($allCoordinates);
        $offset = ($page - 1) * $perPage;
        $paginatedCoordinates = array_slice($allCoordinates, $offset, $perPage);
        
        // Add row numbers
        $data = [];
        foreach ($paginatedCoordinates as $index => $coord) {
            $data[] = [
                'no' => $offset + $index + 1,
                'latitude' => $coord['latitude'],
                'longitude' => $coord['longitude'],
            ];
        }

        return response()->json([
            'data' => $data,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
            'from' => $offset + 1,
            'to' => min($offset + $perPage, $total)
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
