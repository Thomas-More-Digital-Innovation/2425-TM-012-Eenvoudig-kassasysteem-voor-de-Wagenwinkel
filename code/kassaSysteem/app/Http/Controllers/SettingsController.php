<?php

namespace App\Http\Controllers;

use App\Models\User; // Ensure this model points to your User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    use ValidatesRequests;

    // Show the login form with the pre-filled name
    public function showLoginForm()
    {
        $name = session('user_name'); // Retrieve the logged-in user's name from session
        return view('loginSettingsAdminBegeleider', compact('name')); // Pass the name to the view
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
