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
        $this->validate($request, [
            'naam' => 'required|string',
            'wachtwoord' => 'required|string',
        ]);

        // Attempt to find the user by the 'naam'
        $user = User::where('naam', $request->naam)->first();

        if ($user && Hash::check($request->wachtwoord, $user->wachtwoord)) {
            Auth::login($user);
            return redirect()->intended('/category');
        }


        throw ValidationException::withMessages([
            'wachtwoord' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
