<?php

namespace App\Http\Controllers;

use App\Models\VillageStatistic;
use App\Models\VillageDemographic;
use App\Models\VillageBoundary;
use App\Models\Coordinate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MappingController extends Controller
{
    public function index()
    {
        // Get all statistics
        $statistics = VillageStatistic::active()->ordered()->get();

        // Get all demographics
        $demographics = VillageDemographic::active()->ordered()->get();

        // Calculate chart data from users (penduduk)
        $chartData = $this->calculateChartDataFromUsers();

        // Update demographics with dynamic values from user data
        $demographics = $this->updateDemographicsWithDynamicData($demographics, $chartData);

        // Get village boundary
        $boundary = VillageBoundary::active()->first();

        // Get points of interest
        $pointsOfInterest = Coordinate::pointsOfInterest()->get();

        // Format boundary coordinates for JavaScript
        $boundaryCoordinates = null;
        if ($boundary) {
            $boundaryCoordinates = [
                'village_name' => $boundary->village_name,
                'coordinates' => $boundary->coordinates,
                'center' => [$boundary->center_longitude, $boundary->center_latitude],
                'zoom' => $boundary->default_zoom,
                'fill_color' => $boundary->fill_color,
                'fill_opacity' => (float) $boundary->fill_opacity,
                'line_color' => $boundary->line_color,
                'line_width' => (int) $boundary->line_width,
            ];
        }

        // Format POIs for JavaScript
        $pois = $pointsOfInterest->map(function ($poi) {
            return [
                'name' => $poi->name,
                'description' => $poi->description,
                'coordinates' => [$poi->longitude, $poi->latitude],
                'category' => $poi->category,
                'image_url' => $poi->image_url,
            ];
        })->values();

        return view('mapping', compact(
            'statistics',
            'demographics',
            'boundaryCoordinates',
            'pois',
            'chartData'
        ));
    }

    /**
     * Calculate chart data from users (penduduk) table
     */
    private function calculateChartDataFromUsers()
    {
        $totalUsers = User::where('role', 'user')->count();

        // Gender Distribution
        $genderDistribution = User::where('role', 'user')
            ->whereNotNull('gender')
            ->select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->get()
            ->mapWithKeys(function ($item) use ($totalUsers) {
                $percentage = $totalUsers > 0 ? round(($item->count / $totalUsers) * 100, 1) : 0;
                $label = $item->gender === 'male' ? 'Laki-laki' : 'Perempuan';
                $color = $item->gender === 'male' ? '#3b82f6' : '#f472b6';
                return [$item->gender => [
                    'label' => $label,
                    'value' => $item->count,
                    'percentage' => $percentage,
                    'color' => $color,
                ]];
            });

        // Religion Distribution
        $religionLabels = [
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'katolik' => 'Katolik',
            'hindu' => 'Hindu',
            'buddha' => 'Buddha',
            'konghucu' => 'Konghucu',
            'lainnya' => 'Lainnya',
        ];

        $religionColors = [
            'islam' => '#10b981',
            'kristen' => '#3b82f6',
            'katolik' => '#6366f1',
            'hindu' => '#f59e0b',
            'buddha' => '#f97316',
            'konghucu' => '#8b5cf6',
            'lainnya' => '#6b7280',
        ];

        $religionDistribution = User::where('role', 'user')
            ->whereNotNull('religion')
            ->select('religion', DB::raw('count(*) as count'))
            ->groupBy('religion')
            ->get()
            ->map(function ($item) use ($totalUsers, $religionLabels, $religionColors) {
                $percentage = $totalUsers > 0 ? round(($item->count / $totalUsers) * 100, 1) : 0;
                return [
                    'label' => $religionLabels[$item->religion] ?? ucfirst($item->religion),
                    'value' => $item->count,
                    'percentage' => $percentage,
                    'color' => $religionColors[$item->religion] ?? '#6b7280',
                ];
            })->values();

        // Socioeconomic Status Distribution
        $socioeconomicLabels = [
            'sangat_miskin' => 'Sangat Miskin',
            'miskin' => 'Miskin',
            'menengah_bawah' => 'Menengah Bawah',
            'menengah' => 'Menengah',
            'menengah_atas' => 'Menengah Atas',
            'kaya' => 'Kaya',
        ];

        $socioeconomicColors = [
            'sangat_miskin' => '#dc2626',
            'miskin' => '#ea580c',
            'menengah_bawah' => '#f59e0b',
            'menengah' => '#10b981',
            'menengah_atas' => '#3b82f6',
            'kaya' => '#8b5cf6',
        ];

        $socioeconomicDistribution = User::where('role', 'user')
            ->whereNotNull('socioeconomic_status')
            ->select('socioeconomic_status', DB::raw('count(*) as count'))
            ->groupBy('socioeconomic_status')
            ->get()
            ->map(function ($item) use ($totalUsers, $socioeconomicLabels, $socioeconomicColors) {
                $percentage = $totalUsers > 0 ? round(($item->count / $totalUsers) * 100, 1) : 0;
                return [
                    'label' => $socioeconomicLabels[$item->socioeconomic_status] ?? ucfirst($item->socioeconomic_status),
                    'value' => $item->count,
                    'percentage' => $percentage,
                    'color' => $socioeconomicColors[$item->socioeconomic_status] ?? '#6b7280',
                ];
            })->values();

        // Age Group Distribution
        $ageGroups = User::where('role', 'user')
            ->whereNotNull('birth_date')
            ->get()
            ->map(function ($user) {
                $age = Carbon::parse($user->birth_date)->age;
                if ($age < 15) return 'anak';
                if ($age < 25) return 'remaja';
                if ($age < 45) return 'dewasa_muda';
                if ($age < 65) return 'dewasa';
                return 'lansia';
            })
            ->countBy();

        $ageGroupLabels = [
            'anak' => 'Anak (0-14)',
            'remaja' => 'Remaja (15-24)',
            'dewasa_muda' => 'Dewasa Muda (25-44)',
            'dewasa' => 'Dewasa (45-64)',
            'lansia' => 'Lansia (65+)',
        ];

        $ageGroupColors = [
            'anak' => '#fbbf24',
            'remaja' => '#3b82f6',
            'dewasa_muda' => '#10b981',
            'dewasa' => '#8b5cf6',
            'lansia' => '#f472b6',
        ];

        $ageGroupDistribution = collect($ageGroups)->map(function ($count, $group) use ($totalUsers, $ageGroupLabels, $ageGroupColors) {
            $percentage = $totalUsers > 0 ? round(($count / $totalUsers) * 100, 1) : 0;
            return [
                'label' => $ageGroupLabels[$group] ?? ucfirst($group),
                'value' => $count,
                'percentage' => $percentage,
                'color' => $ageGroupColors[$group] ?? '#6b7280',
            ];
        })->values();

        return [
            'gender_distribution' => $genderDistribution,
            'religion_distribution' => $religionDistribution,
            'socioeconomic_distribution' => $socioeconomicDistribution,
            'age_group_distribution' => $ageGroupDistribution,
            'total_population' => $totalUsers,
        ];
    }

    /**
     * Update demographics with dynamic values calculated from user data
     */
    private function updateDemographicsWithDynamicData($demographics, $chartData)
    {
        return $demographics->map(function ($demo) use ($chartData) {
            // Update Demografi Seimbang with actual gender distribution
            if ($demo->key === 'gender_balance') {
                $maleData = $chartData['gender_distribution']['male'] ?? null;
                $femaleData = $chartData['gender_distribution']['female'] ?? null;
                
                if ($maleData && $femaleData) {
                    $demo->value = $maleData['percentage'] . '% : ' . $femaleData['percentage'] . '%';
                }
            }
            
            // Update Dominasi Usia Produktif with actual productive age percentage
            if ($demo->key === 'productive_age') {
                $ageGroups = $chartData['age_group_distribution'] ?? [];
                $productiveCount = 0;
                $totalPop = $chartData['total_population'] ?? 0;
                
                // Count productive age groups (15-64 years): Remaja, Dewasa Muda, Dewasa
                foreach ($ageGroups as $group) {
                    $label = strtolower($group['label'] ?? '');
                    if (strpos($label, 'remaja') !== false || 
                        strpos($label, 'dewasa muda') !== false || 
                        (strpos($label, 'dewasa') !== false && strpos($label, 'lansia') === false)) {
                        $productiveCount += $group['value'] ?? 0;
                    }
                }
                
                $productivePercentage = $totalPop > 0 ? round(($productiveCount / $totalPop) * 100, 1) : 0;
                $demo->value = $productivePercentage . '% penduduk aktif';
            }
            
            return $demo;
        });
    }
}
