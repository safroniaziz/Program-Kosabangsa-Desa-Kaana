<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

// Mental Health Assessment routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Assessment routes
    Route::get('/assessment/mental-health', [AssessmentController::class, 'mentalHealth'])->name('assessment.mental-health');
    Route::get('/assessment/{assessment}/start', [AssessmentController::class, 'start'])->name('assessment.start');
    Route::post('/assessment/{assessment}/submit', [AssessmentController::class, 'submit'])->name('assessment.submit');
    Route::post('/assessment/{assessment}/submit-dcm', [AssessmentController::class, 'submitDcm'])->name('assessment.submit-dcm');
    Route::get('/assessment/result/{userAssessment}', [AssessmentController::class, 'result'])->name('assessment.result');
    Route::get('/assessment/dcm-result/{result}', [AssessmentController::class, 'dcmResult'])->name('assessment.dcm-result');
    Route::get('/assessment/history', [AssessmentController::class, 'history'])->name('assessment.history');
});

// Legacy assessment route (disaster preparedness)
Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment');
Route::post('/assessment/generate-pdf', [AssessmentController::class, 'generatePDFReport'])->name('assessment.generate-pdf');
