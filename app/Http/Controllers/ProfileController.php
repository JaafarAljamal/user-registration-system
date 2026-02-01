<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * View the profile of the current user.
     */
    public function show()
    {
        // Retrieve the current user along with their associated profile
        $user = Auth::user();

        // Return the view page with the user data passed
        return view('profile.show', compact('user'));
    }
}
