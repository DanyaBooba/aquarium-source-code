<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['log', 'unlogin'])->group(function () {

    Route::get('signin', [AuthController::class, 'signin'])->name('auth.signin');

    Route::get('signup', [AuthController::class, 'signup'])->name('auth.signup');
});
