<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegisterController extends Controller
{

    /**
     * Handle the registration request and persist a new user.
     *
     * This method validates the incoming registration data, creates a new
     * User record with the provided credentials, login the user, and finally 
     * redirects the user to the home route.
     *
     * @param RegisterRequest
     * @return RedirectResponse
     */

    public function store(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect(route('home'));
    }
}
