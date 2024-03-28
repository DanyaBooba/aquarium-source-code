<?php

namespace App\Http\Middleware;

use App\Models\User\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!user_login()) {
            return redirect()->route('auth.signin');
        }

        exit_account();
        return $next($request);
    }
}
