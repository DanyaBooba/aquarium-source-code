<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainRouteController;
use App\Http\Controllers\MainUserController;

Route::prefix('/')->group(function () {
    Route::get('/', [MainRouteController::class, 'index'])->name('main');

    Route::get('download', [MainRouteController::class, 'download'])->name('main.download');
    Route::get('faq', [MainRouteController::class, 'faq'])->name('main.faq');

    Route::get('setlocale/{locale}', [LocaleController::class, 'store'])->name('main.setlocale');

    Route::prefix('about')->group(function () {
        Route::get('/', [MainRouteController::class, 'about'])->name('main.about');

        Route::get('oauth', [MainRouteController::class, 'oauth'])->name('main.oauth');
        Route::get('api', [MainRouteController::class, 'api'])->name('main.api');
        Route::get('tech', [MainRouteController::class, 'tech'])->name('main.tech');
        Route::get('brand', [MainRouteController::class, 'brand'])->name('main.brand');
        Route::get('accessibility', [MainRouteController::class, 'accessibility'])->name('main.accessibility');

        Route::prefix('terms')->group(function () {
            Route::get('/', [MainUserController::class, 'index'])->name('main.terms');

            Route::get('privacy', [MainUserController::class, 'privacy'])->name('main.terms.privacy');
            Route::get('termsofuse', [MainUserController::class, 'termsofuse'])->name('main.terms.termsofuse');
            Route::get('cookie', [MainUserController::class, 'cookie'])->name('main.terms.cookie');
        });

        Route::get('brandbook', function () {
            return redirect()->route('main.brand');
        });
    });
});
