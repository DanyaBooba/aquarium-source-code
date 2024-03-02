<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['log', 'login.session'])->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
});
