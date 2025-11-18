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

        return view('admin.dashboard_admin', compact(
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
            'recentAssessments'
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