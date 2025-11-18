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
                    'key' => $item->socioeconomic_status,
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

        // Education Distribution
        $educationLabels = [
            'tidak_sekolah' => 'Tidak Sekolah',
            'sd' => 'SD',
            'smp' => 'SMP',
            'sma' => 'SMA/SMK',
            'diploma' => 'Diploma',
            'sarjana' => 'Sarjana',
            'pascasarjana' => 'Pascasarjana',
        ];

        $educationOrder = array_keys($educationLabels);

        $educationDistribution = User::where('role', 'user')
            ->whereNotNull('education_level')
            ->select('education_level', DB::raw('count(*) as count'))
            ->groupBy('education_level')
            ->get()
            ->map(function ($item) use ($totalUsers, $educationLabels) {
                $percentage = $totalUsers > 0 ? round(($item->count / $totalUsers) * 100, 1) : 0;
                return [
                    'label' => $educationLabels[$item->education_level] ?? ucfirst(str_replace('_', ' ', $item->education_level)),
                    'value' => $item->count,
                    'percentage' => $percentage,
                    'key' => $item->education_level,
                ];
            })->values();

        $educationGenderRaw = User::where('role', 'user')
            ->whereNotNull('education_level')
            ->whereNotNull('gender')
            ->select('education_level', 'gender', DB::raw('count(*) as count'))
            ->groupBy('education_level', 'gender')
            ->get();

        $educationGenderComparison = $educationGenderRaw
            ->groupBy('education_level')
            ->map(function ($group, $level) use ($educationLabels) {
                $maleCount = (int) optional($group->firstWhere('gender', 'male'))->count;
                $femaleCount = (int) optional($group->firstWhere('gender', 'female'))->count;
                $total = $maleCount + $femaleCount;

                $malePercentage = $total > 0 ? round(($maleCount / $total) * 100, 1) : 0;
                $femalePercentage = $total > 0 ? round(($femaleCount / $total) * 100, 1) : 0;

                return [
                    'label' => $educationLabels[$level] ?? ucfirst(str_replace('_', ' ', $level)),
                    'key' => $level,
                    'male' => $maleCount,
                    'female' => $femaleCount,
                    'total' => $total,
                    'male_percentage' => $malePercentage,
                    'female_percentage' => $femalePercentage,
                ];
            })
            ->sortBy(function ($item) use ($educationOrder) {
                $index = array_search($item['key'], $educationOrder, true);
                return $index === false ? PHP_INT_MAX : $index;
            })
            ->values();

        // Calculate Development Indices
        $developmentIndices = $this->calculateDevelopmentIndices($totalUsers, $socioeconomicDistribution, $educationDistribution, $ageGroupDistribution);

        return [
            'gender_distribution' => $genderDistribution,
            'religion_distribution' => $religionDistribution,
            'socioeconomic_distribution' => $socioeconomicDistribution,
            'age_group_distribution' => $ageGroupDistribution,
            'education_distribution' => $educationDistribution,
            'education_gender_comparison' => $educationGenderComparison,
            'development_indices' => $developmentIndices,
            'total_population' => $totalUsers,
        ];
    }

    /**
     * Calculate development indices from user data
     * 
     * Sumber data: Tabel users dengan field:
     * - socioeconomic_status: untuk menghitung kesejahteraan
     * - education_level: untuk menghitung melek huruf
     * - birth_date: untuk menghitung usia produktif
     * 
     * @param int $totalUsers Total jumlah user dengan role 'user'
     * @param \Illuminate\Support\Collection $socioeconomicDistribution Distribusi status sosial ekonomi
     * @param \Illuminate\Support\Collection $educationDistribution Distribusi tingkat pendidikan
     * @param \Illuminate\Support\Collection $ageGroupDistribution Distribusi kelompok usia
     * @return array
     */
    private function calculateDevelopmentIndices($totalUsers, $socioeconomicDistribution, $educationDistribution, $ageGroupDistribution)
    {
        // 1. Kesejahteraan (Persentase) - berdasarkan status sosial ekonomi menengah ke atas
        // Sumber: field socioeconomic_status di tabel users
        // Menghitung persentase warga dengan status: menengah, menengah_atas, atau kaya
        $welfareCount = 0;
        $welfareLevels = ['menengah', 'menengah_atas', 'kaya'];
        foreach ($socioeconomicDistribution as $status) {
            $key = $status['key'] ?? '';
            if (in_array($key, $welfareLevels, true)) {
                $welfareCount += $status['value'] ?? 0;
            }
        }
        $welfarePercentage = $totalUsers > 0 ? round(($welfareCount / $totalUsers) * 100, 1) : 0;

        // 2. Melek Huruf (Persentase) - warga yang memiliki pendidikan (bukan "tidak_sekolah")
        // Sumber: field education_level di tabel users
        // Menghitung persentase warga yang pernah bersekolah (SD, SMP, SMA, Diploma, Sarjana, Pascasarjana)
        $literateCount = 0;
        foreach ($educationDistribution as $education) {
            if (($education['key'] ?? '') !== 'tidak_sekolah') {
                $literateCount += $education['value'] ?? 0;
            }
        }
        $literacyPercentage = $totalUsers > 0 ? round(($literateCount / $totalUsers) * 100, 1) : 0;

        // 3. Partisipasi Kerja (Persentase) - usia produktif (15-64 tahun)
        // Sumber: field birth_date di tabel users (dihitung usia dari tanggal lahir)
        // Menghitung persentase warga berusia 15-64 tahun (Remaja, Dewasa Muda, Dewasa)
        $workingAgeCount = 0;
        foreach ($ageGroupDistribution as $ageGroup) {
            $label = strtolower($ageGroup['label'] ?? '');
            if (strpos($label, 'remaja') !== false ||
                strpos($label, 'dewasa muda') !== false ||
                (strpos($label, 'dewasa') !== false && strpos($label, 'lansia') === false)) {
                $workingAgeCount += $ageGroup['value'] ?? 0;
            }
        }
        $workParticipationPercentage = $totalUsers > 0 ? round(($workingAgeCount / $totalUsers) * 100, 1) : 0;

        // 4. Indeks Pembangunan (Skor /100) - rata-rata dari 3 indikator di atas
        // Formula: (Kesejahteraan + Melek Huruf + Usia Produktif) / 3
        // Semua data dihitung dari tabel users yang terdaftar di sistem
        $developmentIndex = round(($welfarePercentage + $literacyPercentage + $workParticipationPercentage) / 3, 0);

        // 5. Pendidikan Tinggi (Persentase) - warga dengan pendidikan SMA ke atas
        $higherEducationCount = 0;
        $higherEduLevels = ['sma', 'diploma', 'sarjana', 'pascasarjana'];
        foreach ($educationDistribution as $education) {
            if (in_array($education['key'] ?? '', $higherEduLevels, true)) {
                $higherEducationCount += $education['value'] ?? 0;
            }
        }
        $higherEducationPercentage = $totalUsers > 0 ? round(($higherEducationCount / $totalUsers) * 100, 1) : 0;

        // 6. Status Kesejahteraan Detail
        $welfareDetail = [
            'miskin' => 0,
            'menengah' => 0,
            'sejahtera' => 0,
        ];
        foreach ($socioeconomicDistribution as $status) {
            $key = $status['key'] ?? '';
            $value = $status['value'] ?? 0;
            if (in_array($key, ['sangat_miskin', 'miskin'], true)) {
                $welfareDetail['miskin'] += $value;
            } elseif (in_array($key, ['menengah_bawah', 'menengah'], true)) {
                $welfareDetail['menengah'] += $value;
            } elseif (in_array($key, ['menengah_atas', 'kaya'], true)) {
                $welfareDetail['sejahtera'] += $value;
            }
        }

        // Determine status label
        $statusLabel = 'Sedang';
        $statusColor = 'yellow';
        if ($developmentIndex >= 75) {
            $statusLabel = 'Baik';
            $statusColor = 'green';
        } elseif ($developmentIndex < 50) {
            $statusLabel = 'Perlu Perhatian';
            $statusColor = 'red';
        }

        return [
            'development_index' => $developmentIndex,
            'welfare_percentage' => $welfarePercentage,
            'literacy_percentage' => $literacyPercentage,
            'work_participation_percentage' => $workParticipationPercentage,
            'higher_education_percentage' => $higherEducationPercentage,
            'welfare_detail' => $welfareDetail,
            'status_label' => $statusLabel,
            'status_color' => $statusColor,
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
                    $demo->setAttribute('value', $maleData['percentage'] . '% : ' . $femaleData['percentage'] . '%');
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
                $demo->setAttribute('value', $productivePercentage . '% penduduk aktif');
            }

            // Update Kualitas Pendidikan with higher education statistics
            if ($demo->key === 'education_quality') {
                $educationDistribution = $chartData['education_distribution'] ?? collect();
                $totalPop = $chartData['total_population'] ?? 0;
                $higherEduLevels = ['sma', 'diploma', 'sarjana', 'pascasarjana'];
                $higherEduCount = 0;

                foreach ($educationDistribution as $education) {
                    if (in_array($education['key'], $higherEduLevels, true)) {
                        $higherEduCount += $education['value'] ?? 0;
                    }
                }

                $higherEduPercentage = $totalPop > 0 ? round(($higherEduCount / $totalPop) * 100, 1) : 0;
                $demo->setAttribute('value', $higherEduPercentage . '% lulusan SMA ke atas');
            }

            return $demo;
        });
    }
}
