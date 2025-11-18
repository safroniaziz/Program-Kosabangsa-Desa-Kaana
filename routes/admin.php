<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\CoordinateController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

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
        Route::get('/{id}', [AssessmentController::class, 'show'])->name('show');
        Route::delete('/{id}', [AssessmentController::class, 'destroy'])->name('destroy');
        Route::get('/export', [AssessmentController::class, 'export'])->name('export');

        // PTSD Assessments
        Route::get('/ptsd', [AssessmentController::class, 'ptsdIndex'])->name('ptsd.index');
        Route::get('/ptsd/data', [AssessmentController::class, 'getPTSDAssessments'])->name('ptsd.data');

        // DCM Assessments
        Route::get('/dcm', [AssessmentController::class, 'dcmIndex'])->name('dcm.index');
        Route::get('/dcm/data', [AssessmentController::class, 'getDCMAssessments'])->name('dcm.data');

        Route::get('/history', [AssessmentController::class, 'history'])->name('history');
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
        // DCM Questions
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::get('/data', [QuestionController::class, 'getQuestions'])->name('data');
        Route::get('/create', [QuestionController::class, 'create'])->name('create');
        Route::post('/', [QuestionController::class, 'store'])->name('store');
        Route::get('/{id}', [QuestionController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [QuestionController::class, 'update'])->name('update');
        Route::delete('/{id}', [QuestionController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [QuestionController::class, 'bulkDelete'])->name('bulk-delete');
        Route::post('/{id}/toggle-status', [QuestionController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/import', [QuestionController::class, 'import'])->name('import');
        Route::get('/export', [QuestionController::class, 'export'])->name('export');

        // PTSD Questions
        Route::get('/ptsd', [QuestionController::class, 'PTSDIndex'])->name('ptsd.index');
        Route::get('/ptsd/data', [QuestionController::class, 'getPTSDQuestions'])->name('ptsd.data');
        Route::post('/ptsd', [QuestionController::class, 'PTSDStore'])->name('ptsd.store');
        Route::get('/ptsd/{id}', [QuestionController::class, 'PTSDShow'])->name('ptsd.show');
        Route::get('/ptsd/{id}/edit', [QuestionController::class, 'PTSDEdit'])->name('ptsd.edit');
        Route::put('/ptsd/{id}', [QuestionController::class, 'PTSDUpdate'])->name('ptsd.update');
        Route::delete('/ptsd/{id}', [QuestionController::class, 'PTSDestroy'])->name('ptsd.destroy');
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