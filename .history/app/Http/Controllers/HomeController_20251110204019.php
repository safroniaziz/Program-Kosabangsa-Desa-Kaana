<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coordinate;
use App\Models\UserAssessment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display the home page with dynamic statistics
     */
    public function index()
    {
        // Total Penduduk (users)
        $totalPenduduk = User::where('role', 'user')->count();

        // Total Titik Peta (semua lokasi yang terpetakan)
        $totalTitikPeta = Coordinate::count();

        // Total Assessment (semua assessment yang pernah dibuat)
        $totalAssessment = UserAssessment::count();

        // Population Growth (hitung dari user yang dibuat dalam 1 tahun terakhir)
        $usersLastYear = User::where('role', 'user')
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->count();
        $usersBeforeLastYear = User::where('role', 'user')
            ->where('created_at', '<', Carbon::now()->subYear())
            ->count();

        $populationGrowth = 0;
        if ($usersBeforeLastYear > 0) {
            $populationGrowth = round((($usersLastYear - $usersBeforeLastYear) / $usersBeforeLastYear) * 100, 1);
        }

        // Total completed assessments
        $totalCompletedAssessments = UserAssessment::where('status', 'completed')->count();

        // Assessment Completion Rate (persentase assessment yang completed dari total)
        $totalAssessments = UserAssessment::count();
        $assessmentCompletionRate = $totalAssessments > 0 ? round(($totalCompletedAssessments / $totalAssessments) * 100) : 0;

        // Transactions Today (assessments yang dibuat hari ini)
        $transactionsToday = UserAssessment::whereDate('created_at', today())->count();

        // Active Assessments (assessments yang sedang in_progress atau dibuat hari ini)
        $activeAssessments = UserAssessment::where('status', 'in_progress')
            ->orWhere(function($query) {
                $query->whereDate('created_at', today())
                      ->where('status', 'completed');
            })
            ->count();

        // Recent activity (assessments dalam 7 hari terakhir)
        $recentActivity = UserAssessment::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        return view('home', compact(
            'totalPenduduk',
            'totalTitikPeta',
            'totalAssessment',
            'populationGrowth',
            'assessmentCompletionRate',
            'transactionsToday',
            'activeAssessments',
            'totalCompletedAssessments',
            'recentActivity'
        ));
    }
}

