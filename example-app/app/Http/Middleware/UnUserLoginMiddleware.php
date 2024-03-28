<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnUserLoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (user_login()) {
            return redirect()->route('user');
        }

        return $next($request);
    }
}
