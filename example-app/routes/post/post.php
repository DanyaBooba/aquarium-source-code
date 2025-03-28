<?php

use App\Http\Controllers\User\Post\AddCommentController;
use App\Http\Controllers\User\Post\AddPostController;
use App\Http\Controllers\User\Post\ViewPostController;
use App\Http\Controllers\User\Post\DeletePostController;
use App\Http\Controllers\User\Post\EditPostController;
use App\Http\Controllers\User\Post\ImportPostController;
use App\Http\Controllers\User\Post\LikePostController;
use Illuminate\Support\Facades\Route;

Route::prefix('post')->middleware(['login.session', 'user.blocked', 'user.verified', 'user.check-email'])->group(function () {
    Route::get('add', [AddPostController::class, 'index'])->name('post.add');
    Route::post('add', [AddPostController::class, 'post'])->name('post.add.store');

    Route::get('edit/{idPost}', [EditPostController::class, 'index'])->name('post.edit');
    Route::post('edit/store', [EditPostController::class, 'store'])->name('post.edit.store');

    Route::post('comment/store', [AddCommentController::class, 'store'])->name('post.comment.store');

    Route::get('delete/{idPost}', [DeletePostController::class, 'delete'])->name('post.delete');

    Route::get('like/{id}/{idPost}', [LikePostController::class, 'like'])->name('post.like');

    Route::get('import/{platform}/', [ImportPostController::class, 'import'])->name('post.import');
});

Route::get('post/{id}/{idPost}', [ViewPostController::class, 'id'])->name('post.show');
