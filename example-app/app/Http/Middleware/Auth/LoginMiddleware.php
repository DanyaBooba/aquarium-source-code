<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!user_login()) {
            return redirect()->route('auth.signin');
        }

        if (!user_verify() && !Route::is('user.viewverify')) {
            return redirect()->route('user.viewverify');
        }

        return $next($request);
    }
}
