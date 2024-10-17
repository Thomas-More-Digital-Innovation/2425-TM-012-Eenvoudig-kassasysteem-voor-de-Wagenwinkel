<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function showLoginForm()
    {
        return view('auth.loginSystem');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'naam' => 'required|string',
            'wachtwoord' => 'required|string',
        ]);

        // Attempt to find the user by 'naam'
        $user = User::where('naam', $validated['naam'])->first();

        // Check if the user exists and the password is correct
        if ($user && Hash::check($validated['wachtwoord'], $user->wachtwoord)) {
            Auth::login($user); // Log in the user

            // Store the user's name in the session
            session(['naam' => $user->naam]);

            return redirect()->intended('/category'); // Redirect to intended or fallback route
        }

        // If authentication fails, throw a validation exception with an error message
        throw ValidationException::withMessages([
            'wachtwoord' => __('The provided credentials are incorrect.'),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
