<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        dd("Log");

        return $next($request);
    }
}
