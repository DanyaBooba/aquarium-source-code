<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $raw_theme = session('theme');

        if (in_array($raw_theme, Config::get('app.themes'))) {
            $theme = $raw_theme;
        } else {
            $theme = Config::get('app.theme');
        }

        session(['theme' => $theme]);

        // dd(session('theme'));

        return $next($request);
    }
}
