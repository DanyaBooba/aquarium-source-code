<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['log', 'login.session'])->group(function () {

    Route::get('', [UserController::class, 'index'])->name('user.index');

    Route::get('search', [UserController::class, 'search'])->name('user.search');

    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');

    Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');

    Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');

    Route::get('feed', [UserController::class, 'feed'])->name('user.feed');

    Route::get('hot', [UserController::class, 'hot'])->name('user.hot');

    Route::get('exit', [UserController::class, 'exit'])->name('user.exit');

    Route::get('exit/exactly', [UserController::class, 'exitexactly'])->name('user.exit.exactly');

    Route::get('delete', [UserController::class, 'delete'])->name('user.delete');



    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
});
