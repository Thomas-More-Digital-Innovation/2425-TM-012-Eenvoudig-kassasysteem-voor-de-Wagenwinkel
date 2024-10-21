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
            session(['naam' => $user->naam]);
            session(['userInfo' => [
                'user_id' => $user->user_Id,
                'organisatie_id' => $user->organisatie_id,
            ]]);
            if ($user->wachtwoordWijzigen === 1) {
                session(['force_password_change' => $user->user_Id]); // Store the user's ID in session
                return redirect()->route('passwordChangeForm')->with('user_name', $user->naam); // Send username to the view
            } else {
                Auth::login($user);

                session(['naam' => $user->naam]);
                session(['userInfo' => [
                    'user_id' => $user->user_Id,
                    'organisatie_id' => $user->organisatie_id,
                ]]);

                if ($user->rol_id == 1) {
                    return redirect()->intended('/organisatie-beheer'); // Adjust this route for Admins
                } elseif ($user->rol_id == 2) {
                    return redirect()->intended('/settings'); // Adjust this route for Begeleiders
                }
            }
        }

        throw ValidationException::withMessages([
            'wachtwoord' => 'Opgegeven gegevens kloppen niet',
        ]);
    }




    // Handle logout
    public function logout()
    {
        Auth::logout(); // Log out the user
        return redirect('/'); // Redirect to home or login page
    }
}
