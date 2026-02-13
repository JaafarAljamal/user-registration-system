<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login form view.
     * 
     * @return View
     */
    public function showLoginForm(): View
    {
        // Render and return the login view
        return view('login');
    }
}
