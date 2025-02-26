<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// $app->withMiddleware(function(Middleware $middleware) {
//     $middleware->alias(['admin' => \App\Http\Middleware\AdminMiddleware::class,]);
// });

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // 'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'log' => \App\Http\Middleware\App\LogMiddleware::class,
            'login.session' => \App\Http\Middleware\Auth\LoginMiddleware::class,
            'unlogin' => \App\Http\Middleware\Auth\GuestMiddleware::class,
            'login.no-test' => \App\Http\Middleware\Auth\NoTestMiddleware::class,
            'login.admin' => \App\Http\Middleware\User\AdminMiddleware::class,
            'user.verified' => \App\Http\Middleware\User\VerifiedMiddleware::class,
            'user.blocked' => \App\Http\Middleware\User\BlockUserMiddleware::class,
        ]);

        $middleware->group('web', [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\App\LocaleMiddleware::class,
            \App\Http\Middleware\App\ThemeMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
