<?php

use App\Http\Controllers\User\Post\ViewPostController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\Post\DeletePostController;
use App\Http\Controllers\User\Post\EditPostController;
use App\Http\Controllers\User\Post\LikePostController;
use App\Http\Controllers\User\ShowUser\ShowUserController;
use Illuminate\Support\Facades\Route;

Route::get('user/exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');

Route::get('user/editpost/{idPost}', [EditPostController::class, 'index'])->name('user.post.edit');
Route::get('user/deletepost/{idPost}', [DeletePostController::class, 'delete'])->name('user.post.delete');

Route::get('user/likepost/{id}/{idPost}', [LikePostController::class, 'like'])->name('user.post.like');

Route::get('show/id/{id}', [ShowUserController::class, 'id'])->name('user.show.id');
Route::get('show/{nickname}', [ShowUserController::class, 'nickname'])->name('user.show.nickname');

Route::get('user/id/{id}/{idPost}', [ViewPostController::class, 'id'])->name('user.post.show.id');
