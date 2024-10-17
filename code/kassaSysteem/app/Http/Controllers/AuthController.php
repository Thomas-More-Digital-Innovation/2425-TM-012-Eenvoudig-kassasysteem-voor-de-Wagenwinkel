<?php

namespace App\Http\Controllers;

use App\Models\User; // Ensure this model points to your User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ValidatesRequests;

    // Show the login form
    public function showLoginForm()
    {
        return view('loginSystemAdminBegeleider'); // Adjust to your actual login view name
    }

    // Handle login request for Admin and Begeleider
    public function login(Request $request)
    {
        // Validate the incoming request
        $this->validate($request, [
            'naam' => 'required|string',
            'wachtwoord' => 'required|string',
        ]);

        // Attempt to find the user by 'naam'
        $user = User::where('naam', $request->naam)->first();

        if ($user && Hash::check($request->wachtwoord, $user->wachtwoord)) {
            Auth::login($user); // Log in the user

            // Store the user's name in the session
            session(['naam' => $user->naam]);

            // Check the rol_id to determine the redirect
            if ($user->rol_id == 1) {
                return redirect()->intended('/begeleiderSettings'); // Adjust this route for Admins
            } elseif ($user->rol_id == 2) {
                return redirect()->intended('/settings'); // Adjust this route for Begeleiders
            }
        }

        throw ValidationException::withMessages([
            'wachtwoord' => 'The provided credentials are incorrect.',
        ]);
    }


    // Handle logout
    public function logout()
    {
        Auth::logout(); // Log out the user
        return redirect('/'); // Redirect to home or login page
    }
}
