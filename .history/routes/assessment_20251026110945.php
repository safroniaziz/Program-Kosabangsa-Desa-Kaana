<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

// Assessment routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Assessment routes
    Route::get('/assessment/{assessment}/start', [AssessmentController::class, 'start'])->name('assessment.start');
    Route::get('/assessment/{assessment}/start-new', [AssessmentController::class, 'startNew'])->name('assessment.start-new');
    Route::post('/assessment/{assessment}/submit', [AssessmentController::class, 'submit'])->name('assessment.submit');
    Route::post('/assessment/{assessment}/submit-dcm', [AssessmentController::class, 'submitDcm'])->name('assessment.submit-dcm');
        Route::get('/assessment/dcm-result/{result}', [AssessmentController::class, 'dcmResult'])->name('assessment.dcm-result');
    Route::get('/assessment/history/{assessment}', [AssessmentController::class, 'history'])->name('assessment.history');
    Route::get('/assessment/cleanup-choice/{assessment}', [AssessmentController::class, 'cleanupChoice'])->name('assessment.cleanup-choice');
    Route::post('/assessment/process-cleanup', [AssessmentController::class, 'processCleanup'])->name('assessment.process-cleanup');
    Route::get('/assessment/result/{userAssessment}', [AssessmentController::class, 'result'])->name('assessment.result');
});

// Legacy assessment route (disaster preparedness)
Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment');
Route::post('/assessment/generate-pdf', [AssessmentController::class, 'generatePDFReport'])->name('assessment.generate-pdf');

// Demo route (no authentication required)
Route::get('/assessment/demo-history', [AssessmentController::class, 'demoHistory'])->name('assessment.demo-history');
Route::get('/assessment/demo-history/{assessment}', [AssessmentController::class, 'demoHistoryWithId'])->name('assessment.demo-history-id');
