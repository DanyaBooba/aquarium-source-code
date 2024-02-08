<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;

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

//
// CRUD (create, read, update, delete)
//

// Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

// Route::post('posts', [PostController::class, 'store'])->name('posts.store');

// Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//
// Posts
//

Route::resource('posts', PostController::class);

Route::put('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');

Route::resource('posts/{post}/comments', CommentController::class);

//
// Register
//

Route::get('register', [RegisterController::class, 'index'])->name('register.index');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');

//
// Login
//

Route::get('login', [LoginController::class, 'index'])->name('login.index');

Route::post('login', [LoginController::class, 'store'])->name('login.store');
