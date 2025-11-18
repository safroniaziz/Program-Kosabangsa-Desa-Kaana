<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied at route level
    }

    public function index()
    {
        return view('admin.coordinates.index-custom');
    }

    public function getCoordinates(Request $request)
    {
        if ($request->ajax()) {
            $query = Coordinate::query();

            // Search
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('address', 'like', "%{$search}%")
                      ->orWhere('region', 'like', "%{$search}%");
            }

            // Filter
            if ($request->filled('region')) {
                $query->where('region', $request->input('region'));
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
                'data' => $results->map(function ($coordinate) {
                    return [
                        'id' => $coordinate->id,
                        'name' => $coordinate->name,
                        'region' => $coordinate->region,
                        'address' => $coordinate->address,
                        'latitude' => $coordinate->latitude,
                        'longitude' => $coordinate->longitude,
                        'description' => $coordinate->description,
                        'action' => '<div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-info btn-view" data-id="' . $coordinate->id . '" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-edit" data-id="' . $coordinate->id . '" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-delete" data-id="' . $coordinate->id . '" title="Delete">
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'region' => 'required|string',
            'address' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Coordinate::create($request->all());

        return response()->json(['success' => 'Coordinate added successfully']);
    }

    public function show($id)
    {
        $coordinate = Coordinate::findOrFail($id);
        return view('admin.coordinates.show', compact('coordinate'));
    }

    public function edit($id)
    {
        $coordinate = Coordinate::findOrFail($id);
        return view('admin.coordinates.edit', compact('coordinate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'region' => 'required|string',
            'address' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $coordinate = Coordinate::findOrFail($id);
        $coordinate->update($request->all());

        return response()->json(['success' => 'Coordinate updated successfully']);
    }

    public function destroy($id)
    {
        $coordinate = Coordinate::findOrFail($id);
        $coordinate->delete();

        return response()->json(['success' => 'Coordinate deleted successfully']);
    }

    public function map()
    {
        return view('admin.coordinates.map');
    }

    public function getMapData(Request $request)
    {
        $coordinates = Coordinate::all();
        return response()->json($coordinates);
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
}