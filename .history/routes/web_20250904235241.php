<?php

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

Route::get('/lms', function () {
    return view('lms');
})->name('lms');

Route::get('/mapping', function () {
    return view('mapping');
})->name('mapping');
