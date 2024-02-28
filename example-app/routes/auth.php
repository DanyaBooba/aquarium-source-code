<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// auth.login.index

Route::get('signin', [AuthController::class, 'signin'])->name('auth.signin');
