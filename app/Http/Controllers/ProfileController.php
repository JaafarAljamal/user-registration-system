<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
     * This methoe recieves the validated data from UpdateProfileRequest, updates the user's 
     * profile with the new bio and avatar, redirects back to the profile page.
     * 
     * @param Request
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        // Data validation
        $data = $request->validated();

        // Image upload process if found, and delete the old one
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $oldAvatar = Auth::user()->profile->avatar;
            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
            $data['avatar'] = $path;
        }

        // Update data by the sent fields only
        Auth::user()->profile()->update($data);

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
