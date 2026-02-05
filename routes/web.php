<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/**
 * Home Page
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Display the registration form.
 */
Route::get('/register', function () {
    return view('register');
});

/**
 * Handle account creation requests.
 */
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/home', function () {
    return view('home');
})->name('home');

/**
 * Handle profile viewing requests.
 */
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

/**
 * Handle profile bio update request.
 */
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
