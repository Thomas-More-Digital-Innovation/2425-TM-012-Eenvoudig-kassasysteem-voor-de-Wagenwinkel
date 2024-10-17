<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.loginSystem');
    }

    public function login(Request $request)
    {
        $request->validate([
            'naam' => 'required|string',
            'wachtwoord' => 'required|string',
        ]);

        $user = User::where('naam', $request->naam)->first();

        if ($user && Hash::check($request->wachtwoord, $user->wachtwoord)) {
            // Check if the user needs to change their password
            if ($user->wachtwoordWijzigen === 1) {
                session(['force_password_change' => $user->user_Id]); // Store the user's ID in session
                return redirect()->route('passwordChangeForm')->with('user_name', $user->naam); // Send username to the view
            } else {
                return redirect()->intended('category'); // Redirect to category page
            }
        }

        throw ValidationException::withMessages([
            'wachtwoord' => 'The provided credentials are incorrect.',
        ]);
    }



    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:1|confirmed',
        ]);

        // Get the user ID from the session
        $user_Id = session('force_password_change');
        $user = User::find($user_Id);

        if ($user) {
            // Update the password
            $user->wachtwoord = Hash::make($request->new_password);
            $user->wachtwoordWijzigen = 0; // Reset the toggle
            $user->save();

            // Remove the session variable
            session()->forget('force_password_change');

            // Log the user in after password change
            Auth::login($user);

            return redirect()->route('category');
        }

        return response()->json(['success' => false, 'message' => 'User not found.']);
    }



    public function resetPassword(Request $request, $user_Id)
    {
        // Find the user by ID
        $user = User::find($user_Id);

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Check if the toggle is checked and reset the password
        if ($request->has('reset_password')) {
            // Reset the password to '1234'
            $user->wachtwoord = '1234'; // Make sure to hash the password
            $user->wachtwoordWijzigen = 1; // Optional: set a flag to indicate the password has been reset
        } else {
            // If the toggle is unchecked, you can implement logic to handle that if needed
            $user->wachtwoordWijzigen = 0; // Optional
        }

        // Save the user with the updated password
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Password has been reset successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
