<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->middleware(['login.session', 'login.admin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin');
    Route::get('posts', [AdminController::class, 'posts'])->name('admin.posts');

    Route::get('set-user-active/{iduser}', [AdminController::class, 'set_user_active'])->name('admin.set-user-active');
    Route::get('set-user-unactive/{iduser}', [AdminController::class, 'set_user_unactive'])->name('admin.set-user-unactive');

    Route::get('block-user/{iduser}', [AdminController::class, 'block_user'])->name('admin.block-user');
    Route::get('unblock-user/{iduser}', [AdminController::class, 'unblock_user'])->name('admin.unblock-user');
});
