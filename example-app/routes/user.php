<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ShowController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['log', 'login.session'])->group(function () {
    Route::get('', [UserController::class, 'index'])->name('user.index');
    Route::get('search', [UserController::class, 'search'])->name('user.search');
    Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');
    Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');
    Route::get('feed', [UserController::class, 'feed'])->name('user.feed');
    Route::get('trends', [UserController::class, 'trends'])->name('user.trends');

    Route::get('settings', [SettingsController::class, 'index'])->name('user.settings.index');

    Route::get('exit', [ExitController::class, 'index'])->name('user.exit');
    Route::get('exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');

    Route::get('post/add', [PostsController::class, 'index'])->name('user.add-post');

    Route::get('delete', [DeleteController::class, 'delete'])->name('user.delete');

    Route::get('/{nickname}', [ShowController::class, 'nickname'])->name('user.show.nickname');
    Route::get('/id/{id}', [ShowController::class, 'id'])->name('user.show.id');
});
