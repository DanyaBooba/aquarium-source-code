<?php

use App\Http\Controllers\User\ComplainController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\Post\AddPostController;
use App\Http\Controllers\User\Post\EditPostController;
use App\Http\Controllers\User\Post\ImportPostController;
use App\Http\Controllers\User\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['login.session', 'user.blocked'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user');

        Route::get('sub/{id}', [SubscribeController::class, 'index'])->name('user.sub');
        Route::get('complain/{id}', [ComplainController::class, 'index'])->name('user.complain');

        Route::get('search', [UserController::class, 'search'])->name('user.search');
        Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');
        Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');
        Route::get('feed', [UserController::class, 'feed'])->name('user.feed');

        Route::get('addpost', [AddPostController::class, 'index'])->name('user.post.add');
        Route::post('addpost', [AddPostController::class, 'post'])->name('user.post.add.store');

        Route::post('changepost', [EditPostController::class, 'post'])->name('user.post.change');

        Route::get('importpost', [ImportPostController::class, 'index'])->name('user.importpost');
        Route::post('importpost', [ImportPostController::class, 'post'])->name('user.importpost');

        Route::get('second/change', [UserController::class, 'changeToSecondAccount'])->name('user.change-account');
        Route::get('second/remove', [UserController::class, 'removeSecondAccount'])->name('user.remove-second-account');

        Route::get('delete', [DeleteController::class, 'index'])->name('user.delete');
        Route::post('delete', [DeleteController::class, 'post'])->name('user.delete.post');
        Route::post('delete/service', [DeleteController::class, 'service'])->name('user.delete.service.post');

        Route::get('exit', [ExitController::class, 'index'])->name('user.exit');
    });
});
