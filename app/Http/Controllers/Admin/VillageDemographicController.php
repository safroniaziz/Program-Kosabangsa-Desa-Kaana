<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VillageDemographicController extends Controller
{
    public function index()
    {
        // Get all users (warga) - excluding admins
        $users = User::where('role', 'user')->get();
        $totalUsers = $users->count();

        // Gender Statistics
        $genderStats = [
            'male' => $users->where('gender', 'male')->count(),
            'female' => $users->where('gender', 'female')->count(),
            'unknown' => $users->whereNull('gender')->count(),
        ];

        // Age Statistics (based on birth_date)
        $ageStats = $this->calculateAgeStats($users);

        // Religion Statistics
        $religionLabels = [
            'islam' => 'Islam', 
            'kristen' => 'Kristen', 
            'katolik' => 'Katolik',
            'hindu' => 'Hindu', 
            'buddha' => 'Buddha', 
            'konghucu' => 'Konghucu', 
            'lainnya' => 'Lainnya'
        ];
        $religionStats = [];
        foreach ($religionLabels as $key => $label) {
            $count = $users->where('religion', $key)->count();
            if ($count > 0) {
                $religionStats[$key] = [
                    'label' => $label,
                    'count' => $count,
                    'percentage' => $totalUsers > 0 ? round(($count / $totalUsers) * 100, 1) : 0
                ];
            }
        }
        $religionStats['unknown'] = [
            'label' => 'Belum Diisi',
            'count' => $users->whereNull('religion')->count(),
            'percentage' => $totalUsers > 0 ? round(($users->whereNull('religion')->count() / $totalUsers) * 100, 1) : 0
        ];

        // Education Statistics
        $educationLabels = [
            'tidak_sekolah' => 'Tidak Sekolah', 
            'sd' => 'SD', 
            'smp' => 'SMP', 
            'sma' => 'SMA/SMK',
            'diploma' => 'Diploma', 
            'sarjana' => 'Sarjana', 
            'pascasarjana' => 'Pascasarjana'
        ];
        $educationStats = [];
        foreach ($educationLabels as $key => $label) {
            $count = $users->where('education_level', $key)->count();
            if ($count > 0) {
                $educationStats[$key] = [
                    'label' => $label,
                    'count' => $count,
                    'percentage' => $totalUsers > 0 ? round(($count / $totalUsers) * 100, 1) : 0
                ];
            }
        }
        $educationStats['unknown'] = [
            'label' => 'Belum Diisi',
            'count' => $users->whereNull('education_level')->count(),
            'percentage' => $totalUsers > 0 ? round(($users->whereNull('education_level')->count() / $totalUsers) * 100, 1) : 0
        ];

        // Socioeconomic Statistics
        $socioeconomicLabels = [
            'sangat_miskin' => 'Sangat Miskin', 
            'miskin' => 'Miskin', 
            'menengah_bawah' => 'Menengah Bawah',
            'menengah' => 'Menengah', 
            'menengah_atas' => 'Menengah Atas', 
            'kaya' => 'Kaya'
        ];
        $socioeconomicStats = [];
        foreach ($socioeconomicLabels as $key => $label) {
            $count = $users->where('socioeconomic_status', $key)->count();
            if ($count > 0) {
                $socioeconomicStats[$key] = [
                    'label' => $label,
                    'count' => $count,
                    'percentage' => $totalUsers > 0 ? round(($count / $totalUsers) * 100, 1) : 0
                ];
            }
        }
        $socioeconomicStats['unknown'] = [
            'label' => 'Belum Diisi',
            'count' => $users->whereNull('socioeconomic_status')->count(),
            'percentage' => $totalUsers > 0 ? round(($users->whereNull('socioeconomic_status')->count() / $totalUsers) * 100, 1) : 0
        ];

        return view('admin.village-demographics.index', compact(
            'totalUsers',
            'genderStats',
            'ageStats',
            'religionStats',
            'educationStats',
            'socioeconomicStats'
        ));
    }

    private function calculateAgeStats($users)
    {
        $now = Carbon::now();
        $ageGroups = [
            '0-17' => ['label' => 'Anak-anak & Remaja (0-17)', 'count' => 0],
            '18-25' => ['label' => 'Dewasa Muda (18-25)', 'count' => 0],
            '26-35' => ['label' => 'Dewasa (26-35)', 'count' => 0],
            '36-45' => ['label' => 'Paruh Baya (36-45)', 'count' => 0],
            '46-55' => ['label' => 'Pra-Lansia (46-55)', 'count' => 0],
            '56-65' => ['label' => 'Lansia Muda (56-65)', 'count' => 0],
            '65+' => ['label' => 'Lansia (65+)', 'count' => 0],
            'unknown' => ['label' => 'Belum Diisi', 'count' => 0],
        ];

        foreach ($users as $user) {
            if ($user->birth_date) {
                $age = Carbon::parse($user->birth_date)->age;
                
                if ($age <= 17) {
                    $ageGroups['0-17']['count']++;
                } elseif ($age <= 25) {
                    $ageGroups['18-25']['count']++;
                } elseif ($age <= 35) {
                    $ageGroups['26-35']['count']++;
                } elseif ($age <= 45) {
                    $ageGroups['36-45']['count']++;
                } elseif ($age <= 55) {
                    $ageGroups['46-55']['count']++;
                } elseif ($age <= 65) {
                    $ageGroups['56-65']['count']++;
                } else {
                    $ageGroups['65+']['count']++;
                }
            } else {
                $ageGroups['unknown']['count']++;
            }
        }

        $totalUsers = $users->count();
        foreach ($ageGroups as $key => &$group) {
            $group['percentage'] = $totalUsers > 0 ? round(($group['count'] / $totalUsers) * 100, 1) : 0;
        }

        return $ageGroups;
    }
}
