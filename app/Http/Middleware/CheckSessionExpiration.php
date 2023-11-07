<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiration
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the session is expired based on your criteria
            if (session('last_activity') < now()->subMinutes(config('session.lifetime'))) {
                // Session has expired, log the user out and redirect to the login page
                Auth::logout();
                return redirect('/login')->with('session_expired', 'Your session has expired. Please log in again.');
            }
        }

        return $next($request);
    }
}