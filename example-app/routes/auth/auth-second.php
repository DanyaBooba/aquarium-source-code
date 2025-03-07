<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;

Route::prefix('second')->middleware(['login.session', 'login.no-test', 'user.verified', 'user.check-email'])->group(function () {
    Route::prefix('signin')->group(function () {
        Route::get('', [LoginController::class, 'second_index'])->name('second.auth.signin');
        Route::get('email', [LoginController::class, 'second_email'])->name('second.auth.signin.email');
        Route::post('email', [LoginController::class, 'second_store'])->name('second.auth.signin.email.store');

        Route::get('yandex', [SocialController::class, 'second_yandex'])->name('second.auth.signin.yandex');
        Route::get('google', [SocialController::class, 'second_google'])->name('second.auth.signin.google');
    });
});
