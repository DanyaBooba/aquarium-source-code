<?php

use App\Http\Controllers\User\VerifyController;
use App\Http\Controllers\User\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('verify/v/{code}', [VerifyController::class, 'code'])->name('verify.code');

Route::get('verify/set/verify', [VerifyController::class, 'set'])->name('verify.set');

Route::get('verify', [VerifyController::class, 'view'])->name('verify.view');

Route::get('verify-email', [VerifyEmailController::class, 'view'])->name('verify-email.view');

Route::post('verify-email', [VerifyEmailController::class, 'store'])->name('verify-email.store');
