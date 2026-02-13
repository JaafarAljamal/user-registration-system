<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

    /**
     * Handle the incoming login requests.
     * 
     * This method validates the provided credentials, attempts to authenticate
     * the user, regenerates the session on success to prevent session fixation,
     * and redirects the user to their intended destination or a default route.
     * If authentication fails, it redirects back with an error message.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
