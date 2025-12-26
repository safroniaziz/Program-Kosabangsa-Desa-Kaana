<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\CoordinateController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\VillageStatisticController;
use App\Http\Controllers\Admin\VillageDemographicController;
use App\Http\Controllers\Admin\VillageBoundaryController;
use App\Http\Controllers\Admin\MentalHealthAlertController;
use App\Http\Controllers\Admin\UserAnswerController;
use App\Http\Controllers\Admin\DcmAssessmentResultController;
use App\Http\Controllers\Admin\NaturalResourceController;
use App\Http\Controllers\Admin\InfrastructureController;
use App\Http\Controllers\Admin\EconomicActivityController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // Village Statistics
    Route::prefix('village-statistics')->name('village-statistics.')->group(function () {
        Route::get('/', [VillageStatisticController::class, 'index'])->name('index');
        Route::get('/data', [VillageStatisticController::class, 'getStatistics'])->name('data');
        Route::post('/', [VillageStatisticController::class, 'store'])->name('store');
        Route::get('/{id}', [VillageStatisticController::class, 'show'])->name('show');
        Route::put('/{id}', [VillageStatisticController::class, 'update'])->name('update');
        Route::delete('/{id}', [VillageStatisticController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [VillageStatisticController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Village Demographics
    Route::prefix('village-demographics')->name('village-demographics.')->group(function () {
        Route::get('/', [VillageDemographicController::class, 'index'])->name('index');
        Route::get('/data', [VillageDemographicController::class, 'getDemographics'])->name('data');
        Route::post('/', [VillageDemographicController::class, 'store'])->name('store');
        Route::get('/{id}', [VillageDemographicController::class, 'show'])->name('show');
        Route::put('/{id}', [VillageDemographicController::class, 'update'])->name('update');
        Route::delete('/{id}', [VillageDemographicController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [VillageDemographicController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Village Boundaries
    Route::prefix('village-boundaries')->name('village-boundaries.')->group(function () {
        Route::get('/', [VillageBoundaryController::class, 'index'])->name('index');
        Route::get('/data', [VillageBoundaryController::class, 'getBoundaries'])->name('data');
        Route::post('/', [VillageBoundaryController::class, 'store'])->name('store');
        Route::get('/{id}', [VillageBoundaryController::class, 'show'])->name('show');
        Route::put('/{id}', [VillageBoundaryController::class, 'update'])->name('update');
        Route::delete('/{id}', [VillageBoundaryController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [VillageBoundaryController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Natural Resources (Sumber Daya Alam)
    Route::prefix('natural-resources')->name('natural-resources.')->group(function () {
        Route::get('/', [NaturalResourceController::class, 'index'])->name('index');
        Route::get('/data', [NaturalResourceController::class, 'getData'])->name('data');
        Route::post('/', [NaturalResourceController::class, 'store'])->name('store');
        Route::get('/{id}', [NaturalResourceController::class, 'show'])->name('show');
        Route::put('/{id}', [NaturalResourceController::class, 'update'])->name('update');
        Route::delete('/{id}', [NaturalResourceController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle', [NaturalResourceController::class, 'toggleStatus'])->name('toggle');
    });

    // Infrastructures (Infrastruktur & Sarana)
    Route::prefix('infrastructures')->name('infrastructures.')->group(function () {
        Route::get('/', [InfrastructureController::class, 'index'])->name('index');
        Route::get('/data', [InfrastructureController::class, 'getData'])->name('data');
        Route::post('/', [InfrastructureController::class, 'store'])->name('store');
        Route::get('/{id}', [InfrastructureController::class, 'show'])->name('show');
        Route::put('/{id}', [InfrastructureController::class, 'update'])->name('update');
        Route::delete('/{id}', [InfrastructureController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle', [InfrastructureController::class, 'toggleStatus'])->name('toggle');
    });

    // Economic Activities (Ekonomi/UMKM)
    Route::prefix('economic-activities')->name('economic-activities.')->group(function () {
        Route::get('/', [EconomicActivityController::class, 'index'])->name('index');
        Route::get('/data', [EconomicActivityController::class, 'getData'])->name('data');
        Route::post('/', [EconomicActivityController::class, 'store'])->name('store');
        Route::get('/{id}', [EconomicActivityController::class, 'show'])->name('show');
        Route::put('/{id}', [EconomicActivityController::class, 'update'])->name('update');
        Route::delete('/{id}', [EconomicActivityController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle', [EconomicActivityController::class, 'toggleStatus'])->name('toggle');
    });

    // Mental Health Alerts
    Route::prefix('mental-health-alerts')->name('mental-health-alerts.')->group(function () {
        Route::get('/', [MentalHealthAlertController::class, 'index'])->name('index');
        Route::get('/data', [MentalHealthAlertController::class, 'getAlerts'])->name('data');
        Route::get('/{id}', [MentalHealthAlertController::class, 'show'])->name('show');
        Route::post('/{id}/acknowledge', [MentalHealthAlertController::class, 'acknowledge'])->name('acknowledge');
        Route::delete('/{id}', [MentalHealthAlertController::class, 'destroy'])->name('destroy');
    });

    // User Answers (Read Only)
    Route::prefix('user-answers')->name('user-answers.')->group(function () {
        Route::get('/', [UserAnswerController::class, 'index'])->name('index');
        Route::get('/data', [UserAnswerController::class, 'getAnswers'])->name('data');
        Route::get('/{id}', [UserAnswerController::class, 'show'])->name('show');
    });

    // DCM Assessment Results (Read Only)
    Route::prefix('dcm-results')->name('dcm-results.')->group(function () {
        Route::get('/', [DcmAssessmentResultController::class, 'index'])->name('index');
        Route::get('/data', [DcmAssessmentResultController::class, 'getResults'])->name('data');
        Route::get('/{id}', [DcmAssessmentResultController::class, 'show'])->name('show');
    });

    // User Management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index');
        Route::get('/data', [UserManagementController::class, 'getUsers'])->name('data');
        Route::post('/', [UserManagementController::class, 'store'])->name('store');
        Route::get('/{id}', [UserManagementController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [UserManagementController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserManagementController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserManagementController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [UserManagementController::class, 'bulkDelete'])->name('bulk-delete');
        Route::get('/export', [UserManagementController::class, 'export'])->name('export');
        Route::get('/history', [UserManagementController::class, 'history'])->name('history');
    });

    // Assessment Management
    Route::prefix('assessments')->name('assessments.')->group(function () {
        Route::get('/', [AssessmentController::class, 'index'])->name('index');
        Route::get('/data', [AssessmentController::class, 'getAssessments'])->name('data');
        Route::get('/export', [AssessmentController::class, 'export'])->name('export');
        Route::get('/history/{userId}/{type}', [AssessmentController::class, 'getHistory'])->name('history');
        Route::get('/{id}', [AssessmentController::class, 'show'])->name('show');
        Route::delete('/{id}', [AssessmentController::class, 'destroy'])->name('destroy');

        // PTSD Assessments
        Route::get('/ptsd', [AssessmentController::class, 'ptsdIndex'])->name('ptsd.index');
        Route::get('/ptsd/data', [AssessmentController::class, 'getPTSDAssessments'])->name('ptsd.data');

        // DCM Assessments
        Route::get('/dcm', [AssessmentController::class, 'dcmIndex'])->name('dcm.index');
        Route::get('/dcm/data', [AssessmentController::class, 'getDCMAssessments'])->name('dcm.data');
    });

    // Coordinate Management
    Route::prefix('coordinates')->name('coordinates.')->group(function () {
        Route::get('/', [CoordinateController::class, 'index'])->name('index');
        Route::get('/data', [CoordinateController::class, 'getCoordinates'])->name('data');
        Route::post('/', [CoordinateController::class, 'store'])->name('store');
        Route::get('/{id}', [CoordinateController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CoordinateController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CoordinateController::class, 'update'])->name('update');
        Route::delete('/{id}', [CoordinateController::class, 'destroy'])->name('destroy');
        Route::get('/map', [CoordinateController::class, 'map'])->name('map');
        Route::get('/map-data', [CoordinateController::class, 'getMapData'])->name('map-data');
        Route::post('/import', [CoordinateController::class, 'import'])->name('import');
        Route::get('/export', [CoordinateController::class, 'export'])->name('export');
    });

    // Question Management
    Route::prefix('questions')->name('questions.')->group(function () {
        // DCM Questions - static routes first
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::get('/data', [QuestionController::class, 'getQuestions'])->name('data');
        Route::get('/create', [QuestionController::class, 'create'])->name('create');
        Route::post('/', [QuestionController::class, 'store'])->name('store');
        Route::post('/bulk-delete', [QuestionController::class, 'bulkDelete'])->name('bulk-delete');
        Route::post('/import', [QuestionController::class, 'import'])->name('import');
        Route::get('/export', [QuestionController::class, 'export'])->name('export');

        // PTSD Questions - must come before {id} routes
        Route::get('/ptsd', [QuestionController::class, 'PTSDIndex'])->name('ptsd.index');
        Route::get('/ptsd/data', [QuestionController::class, 'getPTSDQuestions'])->name('ptsd.data');
        Route::post('/ptsd', [QuestionController::class, 'PTSDStore'])->name('ptsd.store');
        Route::get('/ptsd/{id}', [QuestionController::class, 'PTSDShow'])->name('ptsd.show');
        Route::get('/ptsd/{id}/edit', [QuestionController::class, 'PTSDEdit'])->name('ptsd.edit');
        Route::put('/ptsd/{id}', [QuestionController::class, 'PTSDUpdate'])->name('ptsd.update');
        Route::delete('/ptsd/{id}', [QuestionController::class, 'PTSDestroy'])->name('ptsd.destroy');

        // DCM Questions - {id} wildcard routes last
        Route::get('/{id}', [QuestionController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [QuestionController::class, 'update'])->name('update');
        Route::delete('/{id}', [QuestionController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [QuestionController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Reports & Statistics
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/assessment-statistics', [ReportController::class, 'assessmentStatistics'])->name('assessment-statistics');
        Route::get('/user-statistics', [ReportController::class, 'userStatistics'])->name('user-statistics');
        Route::get('/coordinate-statistics', [ReportController::class, 'coordinateStatistics'])->name('coordinate-statistics');
        Route::post('/generate', [ReportController::class, 'generateReport'])->name('generate');
    });

    // History / Logs
    Route::prefix('history')->name('history.')->group(function () {
        Route::get('/assessments', [AssessmentController::class, 'history'])->name('assessments');
        Route::get('/users', [UserManagementController::class, 'history'])->name('users');
        Route::get('/system', [AdminController::class, 'systemLogs'])->name('system');
    });
});