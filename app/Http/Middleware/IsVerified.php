<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(Auth::user()->email_verified_at)) {
            if (Auth::check()) {    
                // Logout the user
                Auth::logout();

                // Redirect
                return redirect('login')->withErrors([
                    'errors' => ['Sorry! Account not verified.']
                ]);
            }
        }

        return $next($request);
    }
}
