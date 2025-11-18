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

        // Total UMKM Digital (coordinates dengan nama mengandung UMKM atau dari UmkmSeeder)
        $totalUmkm = Coordinate::where('description', 'like', '%UMKM Digital%')
            ->orWhere('name', 'like', '%Digital%')
            ->orWhere('name', 'like', '%UMKM%')
            ->count();

        // Total Smart Services (hitung dari coordinates yang bukan UMKM dan bukan faskes/kesehatan)
        $totalSmartServices = Coordinate::where('description', 'not like', '%UMKM Digital%')
            ->where('name', 'not like', '%Puskesmas%')
            ->where('name', 'not like', '%Klinik%')
            ->where('name', 'not like', '%Pos Kesehatan%')
            ->where('name', 'not like', '%Pusat Pelayanan%')
            ->where('name', 'not like', '%Rumah Singgah%')
            ->where('name', 'not like', '%Pos Gizi%')
            ->where('name', 'not like', '%Pos Obat%')
            ->count();

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

        // Digital Services Percentage (bisa dari persentase layanan aktif)
        $totalServices = $totalUmkm + $totalSmartServices;
        $digitalServicesPercent = $totalServices > 0 ? round(($totalUmkm / $totalServices) * 100) : 0;

        // Transactions Today (assessments yang dibuat hari ini)
        $transactionsToday = UserAssessment::whereDate('created_at', today())->count();

        // Active Assessments (assessments yang sedang in_progress atau dibuat hari ini)
        $activeAssessments = UserAssessment::where('status', 'in_progress')
            ->orWhere(function($query) {
                $query->whereDate('created_at', today())
                      ->where('status', 'completed');
            })
            ->count();

        // Total completed assessments
        $totalCompletedAssessments = UserAssessment::where('status', 'completed')->count();

        // Recent activity (assessments dalam 7 hari terakhir)
        $recentActivity = UserAssessment::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        return view('home', compact(
            'totalPenduduk',
            'totalUmkm',
            'totalSmartServices',
            'populationGrowth',
            'digitalServicesPercent',
            'transactionsToday',
            'activeAssessments',
            'totalCompletedAssessments',
            'recentActivity'
        ));
    }
}

