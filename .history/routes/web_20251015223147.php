<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/assessment', function () {
    return view('assessment');
})->name('assessment');

Route::post('/assessment/pdf-report', [App\Http\Controllers\AssessmentController::class, 'generatePDFReport'])->name('assessment.pdf');

Route::get('/lms', function () {
    return view('lms');
})->name('lms');

Route::get('/learning/{module}', function ($module) {
    return view('learning', compact('module'));
})->name('learning');

Route::get('/mapping', function () {
    return view('mapping');
})->name('mapping');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/assessment.php';
