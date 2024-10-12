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
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to find the user by the 'naam'
        $user = User::where('naam', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/category');
        }


        throw ValidationException::withMessages([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
