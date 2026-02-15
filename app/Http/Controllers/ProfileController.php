<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Show the authenticated user's profile.
     *
     * This method retrieves the current user along with their associated profile
     * and return the profile page with the user data passed.
     * 
     * @return View
     */
    public function show(): View
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Update the authenticated user's profile bio.
     * 
     * This methoe validates the incoming request data, updates the user's profile
     * with the new bio, redirects back to the profile page.
     * 
     * @param Request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'bio' => 'nullable|string|max:500',
        ]);

        Auth::user()->profile()->update([
            'bio' => $data['bio'],
        ]);

        return redirect()->route('profile.show');
    }

    /**
     * Delete the authenticated user's account and profile.
     * 
     * This method logs the user out to secure the session, deletes the user which
     * in turn deletes the profile automatically, invalidates the session, regenerates
     * the CSRF token, and redirects to the homepage with a confirmation message.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Account deleted successfully.');
    }
}
