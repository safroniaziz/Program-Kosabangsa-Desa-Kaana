<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAssessment;
use App\Models\ChecklistMasalahQuestion;
use App\Models\PTSDQuestion;
use App\Models\Coordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied at route level
    }

    public function dashboard()
    {
        // Total Statistics
        $totalUsers = User::count();
        $totalAssessments = UserAssessment::count();
        $totalPTSD = UserAssessment::where('assessment_type', 'ptsd')->count();
        $totalDCM = UserAssessment::where('assessment_type', 'dcm')->count();

        // Current Month Statistics
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyAssessments = UserAssessment::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        $monthlyUsers = User::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        // Risk Level Distribution
        $riskDistribution = UserAssessment::select('risk_level', DB::raw('count(*) as count'))
            ->groupBy('risk_level')
            ->get();

        // Assessment Type Distribution (last 30 days)
        $lastThirtyDays = Carbon::now()->subDays(30);
        $recentAssessments = UserAssessment::where('created_at', '>=', $lastThirtyDays)
            ->select('assessment_type', DB::raw('count(*) as count'))
            ->groupBy('assessment_type')
            ->get();

        // Recent Activities
        $recentActivities = UserAssessment::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Coordinates Statistics
        $totalCoordinates = Coordinate::count();
        $coordinateRegions = Coordinate::select('region', DB::raw('count(*) as count'))
            ->groupBy('region')
            ->get();

        // Questions Statistics
        $totalPTSDQuestions = PTSDQuestion::count();
        $totalDCMQuestions = ChecklistMasalahQuestion::count();

        // Daily Assessment Trends (last 7 days)
        $dailyTrends = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $count = UserAssessment::whereDate('created_at', $date)->count();
            $dailyTrends[] = [
                'date' => $date,
                'count' => $count
            ];
        }

        // Get coordinates data for stats
        $faskes = Coordinate::where('name', 'like', '%Puskesmas%')
                     ->orWhere('name', 'like', '%Klinik%')
                     ->orWhere('name', 'like', '%Pos%')
                     ->count();

        $posyandu = Coordinate::where('name', 'like', '%Posyandu%')
                     ->orWhere('name', 'like', '%Pos Kesehatan%')
                     ->count();

        // Get unique regions from coordinates (as dusuns)
        $dusun = Coordinate::distinct('region')->count('region');

        // Calculate performance metrics from actual data
        $completedAssessments = UserAssessment::where('status', 'completed')->count();
        $assessmentCompletionRate = $totalAssessments > 0 ? round(($completedAssessments / $totalAssessments) * 100, 1) : 0;

        // User activity rate based on assessments created (active users)
        $recentAssessments = UserAssessment::where('created_at', '>=', Carbon::now()->subDays(7))->distinct('user_id')->count();
        $userActivityRate = $totalUsers > 0 ? round(($recentAssessments / $totalUsers) * 100, 1) : 0;

        // Response rate (users who started assessment)
        $usersWithAssessment = UserAssessment::distinct('user_id')->count();
        $responseRate = $totalUsers > 0 ? round(($usersWithAssessment / $totalUsers) * 100, 1) : 0;

        // Participation rate (completed assessments from unique users)
        $participationRate = $totalUsers > 0 ? round(($completedAssessments / $totalUsers) * 100, 1) : 0;

        // Coverage rate based on coordinates
        $coverageRate = $totalCoordinates > 0 ? min(100, round(($totalCoordinates / 10) * 100, 1)) : 0;

        // Prepare stats array for dashboard Kosabangsa
        $stats = [
            'total_users' => $totalUsers,
            'total_assessments' => $totalAssessments,
            'total_ptsd' => $totalPTSD,
            'total_dcm' => $totalDCM,
            'total_coordinates' => $totalCoordinates,
            'total_faskes' => $faskes,
            'total_posyandu' => $posyandu,
            'total_dusun' => $dusun,
            'total_rumah' => Coordinate::where('name', 'like', '%Rumah%')->count(),
            'total_kk' => $totalUsers, // Assuming each user is a KK
            'total_tenaga_kesehatan' => Coordinate::where('name', 'like', '%Tenaga%')
                                           ->orWhere('name', 'like', '%Bidan%')
                                           ->orWhere('name', 'like', '%Dokter%')
                                           ->orWhere('name', 'like', '%Perawat%')
                                           ->count()
        ];

        // Performance metrics for Kosabangsa (calculated from database)
        $performanceMetrics = [
            'user_activity_rate' => $userActivityRate,
            'assessment_completion_rate' => $assessmentCompletionRate,
            'coverage_rate' => $coverageRate,
            'response_rate' => $responseRate,
            'participation_rate' => $participationRate
        ];

        // Program aktif (get from assessments or use default)
        $programAktif = (object) [
            'nama_program' => 'Program Kesiapan Mental Desa Kaana',
            'tahun' => Carbon::now()->year
        ];

        // Assessment Progress data from database
        $monthlyAssessments = UserAssessment::select(
                DB::raw('DATE_FORMAT(created_at, "%M %Y") as bulan'),
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed'),
                'assessment_type'
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%M %Y")'), 'assessment_type')
            ->orderBy('bulan', 'desc')
            ->get()
            ->map(function($item) {
                $item->status = $item->completed == $item->total ? 'Selesai' : 'Sedang Berjalan';
                $item->persentase = $item->total > 0 ? round(($item->completed / $item->total) * 100, 1) : 0;
                $item->jenis = $item->assessment_type == 'ptsd' ? 'PTSD Assessment' : 'DCM Assessment';
                return $item;
            });

        $assessmentProgress = $monthlyAssessments->take(5);

        // Chart data from database
        $assessmentStats = UserAssessment::select('assessment_type', DB::raw('COUNT(*) as count'))
            ->groupBy('assessment_type')
            ->get()
            ->map(function($item) {
                $jenis = $item->assessment_type == 'ptsd' ? 'PTSD' :
                        ($item->assessment_type == 'checklist_masalah' ? 'DCM' : 'Lainnya');
                return ['jenis' => $jenis, 'count' => $item->count];
            });

        $riskLevelStats = UserAssessment::select('risk_level', DB::raw('COUNT(*) as count'))
            ->whereNotNull('risk_level')
            ->groupBy('risk_level')
            ->get()
            ->map(function($item) {
                $level = match($item->risk_level) {
                    'low' => 'Rendah',
                    'medium' => 'Sedang',
                    'high' => 'Tinggi',
                    default => $item->risk_level
                };
                return ['level' => $level, 'count' => $item->count];
            });

        $fasilitasStats = [];
        $puskesmas = Coordinate::where('name', 'like', '%Puskesmas%')->count();
        $posyandu = Coordinate::where('name', 'like', '%Posyandu%')->count();
        $klinik = Coordinate::where('name', 'like', '%Klinik%')->count();
        $rumahSinggah = Coordinate::where('name', 'like', '%Singgah%')->count();

        if ($puskesmas) $fasilitasStats['puskesmas'] = $puskesmas;
        if ($posyandu) $fasilitasStats['posyandu'] = $posyandu;
        if ($klinik) $fasilitasStats['klinik'] = $klinik;
        if ($rumahSinggah) $fasilitasStats['rumah_singgah'] = $rumahSinggah;

        $chartData = [
            'assessmentStats' => $assessmentStats->toArray(),
            'riskLevelStats' => $riskLevelStats->toArray(),
            'fasilitasStats' => $fasilitasStats
        ];

        return view('dashboard_admin', compact(
            'totalUsers',
            'totalAssessments',
            'totalPTSD',
            'totalDCM',
            'monthlyAssessments',
            'monthlyUsers',
            'riskDistribution',
            'recentAssessments',
            'recentActivities',
            'totalCoordinates',
            'coordinateRegions',
            'totalPTSDQuestions',
            'totalDCMQuestions',
            'dailyTrends',
            'recentAssessments',
            'stats',
            'performanceMetrics',
            'programAktif',
            'assessmentProgress',
            'chartData'
        ));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function systemLogs()
    {
        return view('admin.logs.system');
    }
}
