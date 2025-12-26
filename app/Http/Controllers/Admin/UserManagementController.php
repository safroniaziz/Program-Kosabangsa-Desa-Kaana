<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied at route level
    }

    public function index()
    {
        return view('admin.users.index-custom');
    }

    public function getUsers(Request $request)
    {
        $query = User::with('assessments')->where('role', 'user');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
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

        // Gender labels
        $genderLabels = ['male' => 'Laki-laki', 'female' => 'Perempuan'];
        
        // Religion labels
        $religionLabels = [
            'islam' => 'Islam', 'kristen' => 'Kristen', 'katolik' => 'Katolik',
            'hindu' => 'Hindu', 'buddha' => 'Buddha', 'konghucu' => 'Konghucu', 'lainnya' => 'Lainnya'
        ];
        
        // Socioeconomic labels
        $socioeconomicLabels = [
            'sangat_miskin' => 'Sangat Miskin', 'miskin' => 'Miskin', 'menengah_bawah' => 'Menengah Bawah',
            'menengah' => 'Menengah', 'menengah_atas' => 'Menengah Atas', 'kaya' => 'Kaya'
        ];
        
        // Education labels
        $educationLabels = [
            'tidak_sekolah' => 'Tidak Sekolah', 'sd' => 'SD', 'smp' => 'SMP', 'sma' => 'SMA/SMK',
            'diploma' => 'Diploma', 'sarjana' => 'Sarjana', 'pascasarjana' => 'Pascasarjana'
        ];

        return response()->json([
            'data' => $results->map(function ($user) use ($genderLabels, $religionLabels, $socioeconomicLabels, $educationLabels) {
                $assessments = $user->assessments;
                $lastAssessment = $assessments->sortByDesc('created_at')->first();
                
                // Action buttons
                $action = '<div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-info btn-view" data-id="' . $user->id . '" title="View">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="' . $user->id . '" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="' . $user->id . '" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>';

                return [
                    'id' => $user->id,
                    'name' => $user->name ?? 'N/A',
                    'email' => $user->email ?? 'N/A',
                    'role' => $user->role ?? 'user',
                    'gender' => $user->gender,
                    'gender_label' => $genderLabels[$user->gender] ?? '-',
                    'birth_date' => $user->birth_date,
                    'religion' => $user->religion,
                    'religion_label' => $religionLabels[$user->religion] ?? '-',
                    'socioeconomic_status' => $user->socioeconomic_status,
                    'socioeconomic_label' => $socioeconomicLabels[$user->socioeconomic_status] ?? '-',
                    'education_level' => $user->education_level,
                    'education_label' => $educationLabels[$user->education_level] ?? '-',
                    'assessment_count' => $assessments->count(),
                    'last_assessment' => $lastAssessment ? $lastAssessment->created_at->format('Y-m-d H:i') : 'N/A',
                    'created_at' => $user->created_at->format('Y-m-d H:i'),
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'gender' => 'nullable|in:male,female',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu,lainnya',
            'socioeconomic_status' => 'nullable|in:sangat_miskin,miskin,menengah_bawah,menengah,menengah_atas,kaya',
            'education_level' => 'nullable|in:tidak_sekolah,sd,smp,sma,diploma,sarjana,pascasarjana'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'socioeconomic_status' => $request->socioeconomic_status,
            'education_level' => $request->education_level
        ]);

        return response()->json(['success' => 'User berhasil dibuat']);
    }

    public function show($id)
    {
        $user = User::with('assessments')->findOrFail($id);
        $html = view('admin.users.show-partial', compact('user'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
            'gender' => 'nullable|in:male,female',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu,lainnya',
            'socioeconomic_status' => 'nullable|in:sangat_miskin,miskin,menengah_bawah,menengah,menengah_atas,kaya',
            'education_level' => 'nullable|in:tidak_sekolah,sd,smp,sma,diploma,sarjana,pascasarjana'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'socioeconomic_status' => $request->socioeconomic_status,
            'education_level' => $request->education_level
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json(['success' => 'User berhasil diupdate']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => 'User berhasil dihapus']);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        User::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'Users deleted successfully']);
    }

    public function export()
    {
        // Implementation for export
        return response()->json(['success' => 'Export feature coming soon']);
    }

    public function history()
    {
        return view('admin.users.history');
    }
}