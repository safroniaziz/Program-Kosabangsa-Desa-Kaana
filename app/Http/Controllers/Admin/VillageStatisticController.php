<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageStatistic;
use Illuminate\Http\Request;

class VillageStatisticController extends Controller
{
    public function index()
    {
        return view('admin.village-statistics.index');
    }

    public function getStatistics(Request $request)
    {
        // Auto-update total_population dari data users
        $totalPopulationStat = VillageStatistic::where('key', 'total_population')->first();
        if ($totalPopulationStat) {
            $totalUsers = \App\Models\User::where('role', 'user')->count();
            if ($totalPopulationStat->value != $totalUsers) {
                $totalPopulationStat->value = $totalUsers;
                $totalPopulationStat->save();
            }
        }

        $query = VillageStatistic::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('key', 'like', "%{$search}%")
                  ->orWhere('label', 'like', "%{$search}%");
            });
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
            'data' => $results->map(function ($item, $index) use ($page, $perPage) {
                $statusBadge = $item->is_active 
                    ? '<span class="badge badge-success">Aktif</span>' 
                    : '<span class="badge badge-secondary">Nonaktif</span>';
                
                $iconPreview = '<i class="' . ($item->icon ?? 'fas fa-chart-bar') . ' fs-2"></i>';
                
                $action = '<div class="btn-group" role="group">
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
                    'key' => $item->key,
                    'label' => $item->label,
                    'value' => $item->value,
                    'subtext' => $item->subtext ?? '-',
                    'icon' => $item->icon,
                    'icon_preview' => $iconPreview,
                    'order' => $item->order,
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
            'key' => 'required|string|unique:village_statistics,key',
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
            'subtext' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? VillageStatistic::max('order') + 1;

        // Jika key adalah total_population, hitung otomatis dari data users
        if ($data['key'] === 'total_population') {
            $data['value'] = \App\Models\User::where('role', 'user')->count();
        }

        VillageStatistic::create($data);

        return response()->json(['success' => 'Statistik desa berhasil ditambahkan!']);
    }

    public function show($id)
    {
        $statistic = VillageStatistic::findOrFail($id);
        return response()->json($statistic);
    }

    public function update(Request $request, $id)
    {
        $statistic = VillageStatistic::findOrFail($id);

        $request->validate([
            'key' => 'required|string|unique:village_statistics,key,' . $id,
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
            'subtext' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Jika key adalah total_population, hitung otomatis dari data users
        if ($data['key'] === 'total_population') {
            $data['value'] = \App\Models\User::where('role', 'user')->count();
        }

        $statistic->update($data);

        return response()->json(['success' => 'Statistik desa berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $statistic = VillageStatistic::findOrFail($id);
        $statistic->delete();

        return response()->json(['success' => 'Statistik desa berhasil dihapus!']);
    }

    public function toggleStatus($id)
    {
        $statistic = VillageStatistic::findOrFail($id);
        $statistic->is_active = !$statistic->is_active;
        $statistic->save();

        $status = $statistic->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return response()->json(['success' => "Statistik desa berhasil {$status}!"]);
    }
}
