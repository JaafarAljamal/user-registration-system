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
     * @return View
     */

    public function show(): View
    {
        // Retrieve the current user along with their associated profile
        $user = Auth::user();

        // Return the view page with the user data passed
        return view('profile.show', compact('user'));
    }

    /**
     * Update the authenticated user's profile bio.
     * 
     * @param Request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $data = $request->validate([
            'bio' => 'required|string|max:500',
        ]);

        // Update the user's profile with the new bio
        Auth::user()->profile()->update([
            'bio' => $data['bio'],
        ]);

        // Redirect back to the profile page
        return redirect()->route('profile.show');
    }
}
