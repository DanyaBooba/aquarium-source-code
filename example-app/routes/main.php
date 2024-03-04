<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainRouteController;
use App\Http\Controllers\MainUserController;

Route::prefix('/')->group(function () {

    Route::get('/', [MainRouteController::class, 'index'])->name('main.index');

    Route::get('download', [MainRouteController::class, 'download'])->name('main.download');

    Route::get('faq', [MainRouteController::class, 'faq'])->name('main.faq');

    Route::prefix('about')->group(function () {

        Route::get('/', [MainRouteController::class, 'about'])->name('main.about');

        Route::get('oauth', [MainRouteController::class, 'oauth'])->name('main.oauth');

        Route::get('tech', [MainRouteController::class, 'tech'])->name('main.tech');

        Route::prefix('user')->group(function () {

            Route::get('/', [MainUserController::class, 'index'])->name('main.user.index');

            Route::get('privacy', [MainUserController::class, 'privacy'])->name('main.user.privacy');

            Route::get('termsofuse', [MainUserController::class, 'termsofuse'])->name('main.user.termsofuse');

            Route::get('cookie', [MainUserController::class, 'cookie'])->name('main.user.cookie');
        });
    });
});
