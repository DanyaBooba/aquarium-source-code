<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\RestoreController;
use Illuminate\Support\Facades\Route;

Route::middleware(['log', 'unlogin'])->group(function () {

    Route::get('signin', [LoginController::class, 'index'])->name('auth.signin');
    Route::get('signin/email', [LoginController::class, 'email'])->name('auth.signin.email');
    Route::post('signin/email', [LoginController::class, 'store'])->name('auth.signin.email.store');

    Route::get('signup', [RegisterController::class, 'index'])->name('auth.signup');
    Route::get('signup/email', [RegisterController::class, 'email'])->name('auth.signup.email');
    Route::post('signup/email', [RegisterController::class, 'store'])->name('auth.signup.email.store');

    Route::get('sign/help', [AuthController::class, 'help'])->name('auth.help');

    Route::get('sign/restore', [RestoreController::class, 'index'])->name('auth.restore');
    Route::post('sign/restore', [RestoreController::class, 'store'])->name('auth.restore.store');

    Route::get('sign/code', [CodeController::class, 'index'])->name('auth.code');
    Route::post('sign/code', [CodeController::class, 'store'])->name('auth.code.store');

    Route::get('sign/google', [SocialController::class, 'google'])->name('auth.google');
    Route::get('sign/github', [SocialController::class, 'github'])->name('auth.github');
    Route::get('sign/mailru', [SocialController::class, 'mailru'])->name('auth.mailru');
    Route::get('sign/yandex', [SocialController::class, 'yandex'])->name('auth.yandex');
    Route::get('sign/vk', [SocialController::class, 'vk'])->name('auth.vk');

    Route::get('login', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('sign/in', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('register', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('registration', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('sign/up', function () {
        return redirect()->route('auth.signup');
    });
});
