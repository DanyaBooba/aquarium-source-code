<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\UserLoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['login.session', 'log'])->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');
});
