<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $user = \App\Helpers\Login::getUser()['user_id'];
        // Check if user_id and organisatie_id are set in the session
        if ($organisation === null || $user === null) {
            // Redirect to the login page or an error page
            return redirect()->route('login'); // Change 'login' to your login route name
        }

        return $next($request);
    }
}
