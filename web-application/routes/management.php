<?php

use App\Http\Controllers\Management\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Management\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Management\Auth\EmailVerificationNotificationController;
// use App\Http\Controllers\Management\Auth\EmailVerificationPromptController;
// use App\Http\Controllers\Management\Auth\NewPasswordController;
// use App\Http\Controllers\Management\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Management\Auth\RegisteredUserController;
// use App\Http\Controllers\Management\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\DashboardController;

Route::middleware('auth:management')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

});

Route::name('auth.')->group(function () {

    // Route::get('/register', [RegisteredUserController::class, 'create'])
    //                 ->middleware('guest:management')
    //                 ->name('register');

    // Route::post('/register', [RegisteredUserController::class, 'store'])
    //                 ->middleware('guest:management');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:management')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:management');

    // Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    //                 ->middleware('guest:management')
    //                 ->name('password.request');

    // Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    //                 ->middleware(['guest:management'])
    //                 ->name('password.email');

    // Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    //                 ->middleware(['guest:management'])
    //                 ->name('password.reset');

    // Route::post('/reset-password', [NewPasswordController::class, 'store'])
    //                 ->middleware(['guest:management'])
    //                 ->name('password.update');

    // Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    //                 ->middleware(['auth:management'])
    //                 ->name('verification.notice');

    // Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    //                 ->middleware(['auth:management', 'signed', 'throttle:6,1'])
    //                 ->name('verification.verify');

    // Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //                 ->middleware(['auth:management', 'throttle:6,1'])
    //                 ->name('verification.send');

    // Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    //                 ->middleware(['auth:management'])
    //                 ->name('password.confirm');

    // Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    //                 ->middleware(['auth:management']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout')
        ->middleware('auth:management');

});
