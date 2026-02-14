<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Handle the routes that do not require a login.
 */
Route::middleware(['guest'])->group(function () {

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
    })->name('register');

    /**
     * Handle account creation requests.
     */
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    /**
     * Handle login viewing requests.
     */
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.showLoginForm');

    /**
     * Handle user login requests.
     */
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

/**
 * Handle the protected routes that require a login.
 */
Route::middleware(['auth'])->group(function () {

    /**
     * Handle home viewing request.
     */
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
});
