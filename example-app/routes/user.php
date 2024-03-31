<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\User\Settings\AppearanceController;
use App\Http\Controllers\User\Settings\NotificationsController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\ProfileEmailController;
use App\Http\Controllers\User\Settings\ProfilePasswordController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ShowController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['login.session'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');

    Route::get('search', [UserController::class, 'search'])->name('user.search');
    Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');
    Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');
    Route::get('feed', [UserController::class, 'feed'])->name('user.feed');
    Route::get('trends', [UserController::class, 'trends'])->name('user.trends');

    Route::get('exit', [ExitController::class, 'index'])->name('user.exit');
    Route::get('exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');

    Route::get('post/add', [PostsController::class, 'index'])->name('user.add-post');

    Route::get('delete', [DeleteController::class, 'index'])->name('user.delete');

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings');

        Route::middleware(['user.verified'])->group(function () {
            Route::prefix('profile')->group(function () {
                Route::get('', [ProfileController::class, 'index'])->name('settings.profile');
                Route::post('', [ProfileController::class, 'store'])->name('settings.profile.store');

                Route::get('password', [ProfilePasswordController::class, 'index'])->name('settings.profile.password');
                Route::post('password', [ProfilePasswordController::class, 'store'])->name('settings.profile.password.store');

                Route::get('email', [ProfileEmailController::class, 'index'])->name('settings.profile.email');
                Route::post('email', [ProfileEmailController::class, 'store'])->name('settings.profile.email.store');
            });

            Route::get('notifications', [NotificationsController::class, 'index'])->name('settings.notifications');
            Route::post('notifications', [NotificationsController::class, 'store'])->name('settings.notifications.store');

            Route::get('appearance', [AppearanceController::class, 'index'])->name('settings.appearance');
            Route::post('appearance', [AppearanceController::class, 'store'])->name('settings.appearance.store');
        });

        Route::get('privacy', [SettingsController::class, 'privacy'])->name('settings.privacy');

        Route::get('storage', [SettingsController::class, 'storage'])->name('settings.storage');

        Route::get('devices', [SettingsController::class, 'devices'])->name('settings.devices');

        Route::get('themes', [SettingsController::class, 'themes'])->name('settings.themes');

        Route::get('language', [SettingsController::class, 'language'])->name('settings.language');

        // Route::get('jquery', [SettingsController::class, 'test']);
    });
});

Route::get('user/{nickname}', [ShowController::class, 'nickname'])->name('user.show.nickname');
Route::get('user/id/{id}', [ShowController::class, 'id'])->name('user.show.id');
