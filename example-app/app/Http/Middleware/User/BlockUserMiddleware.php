<?php

namespace App\Http\Middleware\User;

use App\Models\User\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $findUser = User::where('email', session('email'))->first();

        if ($findUser->blocked) {
            return redirect()->route('user.blocked');
        }

        return $next($request);
    }
}
