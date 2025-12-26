<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivity;
use Illuminate\Http\Request;

class EconomicActivityController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => EconomicActivity::count(),
            'umkm' => EconomicActivity::where('category', 'umkm')->count(),
            'pertanian' => EconomicActivity::where('category', 'pertanian')->count(),
            'pariwisata' => EconomicActivity::where('category', 'pariwisata')->count(),
        ];
        return view('admin.economic-activities.index', compact('stats'));
    }

    public function getData(Request $request)
    {
        $query = EconomicActivity::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('owner_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $query->orderBy($request->input('sort_by', 'id'), $request->input('sort_order', 'desc'));

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
                    'owner_name' => $row->owner_name,
                    'employee_count' => $row->employee_count,
                    'annual_revenue' => $row->annual_revenue ? 'Rp ' . number_format($row->annual_revenue, 0, ',', '.') : '-',
                    'status' => $row->is_active ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-secondary">Nonaktif</span>',
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
        $request->validate(['name' => 'required|string|max:255', 'category' => 'required']);
        EconomicActivity::create($request->all());
        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(EconomicActivity::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        EconomicActivity::findOrFail($id)->update($request->all());
        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        EconomicActivity::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

    public function toggleStatus($id)
    {
        $item = EconomicActivity::findOrFail($id);
        $item->is_active = !$item->is_active;
        $item->save();
        return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
    }
}
