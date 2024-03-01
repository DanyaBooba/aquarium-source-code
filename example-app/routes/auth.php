<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['log', 'unlogin'])->group(function () {

    Route::get('signin', [AuthController::class, 'signin'])->name('auth.signin');

    Route::post('signin', [AuthController::class, 'signinpost'])->name('auth.signin.post');

    Route::get('signup', [AuthController::class, 'signup'])->name('auth.signup');

    Route::post('signup', [AuthController::class, 'signuppost'])->name('auth.signup.post');

    Route::get('login', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('log', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('register', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('registration', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('reg', function () {
        return redirect()->route('auth.signup');
    });
});
