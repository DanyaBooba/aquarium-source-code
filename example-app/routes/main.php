<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainRouteController;
use App\Http\Controllers\MainUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {

    Route::get('/', [MainRouteController::class, 'index'])->name('main.index');

    Route::get('faq', [MainRouteController::class, 'faq'])->name('main.faq');

    Route::prefix('about')->group(function () {

        Route::get('/', [MainRouteController::class, 'about'])->name('main.about');

        Route::prefix('user')->group(function () {

            Route::get('/', [MainUserController::class, 'index'])->name('main.user.index');

            Route::get('privacy', [MainUserController::class, 'privacy'])->name('main.user.privacy');

            Route::get('termsofuse', [MainUserController::class, 'termsofuse'])->name('main.user.termsofuse');

            Route::get('cookie', [MainUserController::class, 'cookie'])->name('main.user.cookie');
        });
    });
});
