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

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.loginSystem'); // Adjust to your actual login view name
    }

    // Handle the login request
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
            return redirect()->intended('/category'); // Redirect to intended page after login
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
