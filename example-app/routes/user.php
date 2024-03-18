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

    Route::get('exit', [ExitController::class, 'index'])->name('user.exit');
    Route::get('exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');

    Route::get('post/add', [PostsController::class, 'index'])->name('user.add-post');

    Route::get('delete', [DeleteController::class, 'delete'])->name('user.delete');



    Route::prefix('settings')->group(function () {
        Route::get('', [SettingsController::class, 'index'])->name('user.settings.index');

        Route::get('profile', [SettingsController::class, 'profile'])->name('user.settings.profile');
        Route::post('profile', [SettingsController::class, 'profile_store'])->name('user.settings.profile.store');

        Route::get('notifications', [SettingsController::class, 'notifications'])->name('user.settings.notifications');

        Route::get('privacy', [SettingsController::class, 'privacy'])->name('user.settings.privacy');

        Route::get('storage', [SettingsController::class, 'storage'])->name('user.settings.storage');

        Route::get('devices', [SettingsController::class, 'devices'])->name('user.settings.devices');

        Route::get('appearance', [SettingsController::class, 'appearance'])->name('user.settings.appearance');
    });

});

Route::get('user/{nickname}', [ShowController::class, 'nickname'])->middleware(['log'])->name('user.show.nickname');
Route::get('user/id/{id}', [ShowController::class, 'id'])->middleware(['log'])->name('user.show.id');
