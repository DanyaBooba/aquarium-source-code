<?php

namespace App\Http\Middleware\Auth;

use App\Models\User\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('email') == 'testaccount') {
            exit_account();
            return redirect()->route('auth.signin');
        }

        return $next($request);
    }
}
