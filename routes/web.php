<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', function (Request $request) {
    // Persist user to database using Eloquent ORM
    User::create([
        'username' => $request->input('username'), // Input key from form
        'email' => $request->input('email'), // Input key from form
        'password' => Hash::make($request->input('password')) // Secure hashing
    ]);
    // Return HTTP 302 redirect on success
    return redirect("/home");
});
