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
use App\Http\Controllers\Management\CustomerController;
use App\Http\Controllers\Management\TrashCanController;
use App\Http\Controllers\Management\ProductController;
use App\Http\Controllers\Management\TrashCanMapController;
use App\Http\Controllers\Management\TrashCanCustomerController;
use App\Http\Controllers\Management\AccountController;

Route::middleware('auth:management')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('customers')->name('customer.')->group(function () {

        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::get('/{uuid}', [CustomerController::class, 'show'])->name('show');
        Route::get('/{uuid}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{uuid}/update', [CustomerController::class, 'update'])->name('update');
        Route::delete('{uuid}', [CustomerController::class, 'destroy'])->name('destroy');

    });

    Route::prefix('trash-can')->name('trash-can.')->group(function () {

        Route::get('/', [TrashCanController::class, 'index'])->name('index');
        Route::post('/', [TrashCanController::class, 'store'])->name('store');
        Route::get('/create', [TrashCanController::class, 'create'])->name('create');
        Route::get('/{uuid}', [TrashCanController::class, 'show'])->name('show');
        Route::get('/{uuid}/edit', [TrashCanController::class, 'edit'])->name('edit');
        Route::put('/{uuid}/update', [TrashCanController::class, 'update'])->name('update');
        Route::delete('{uuid}', [TrashCanController::class, 'destroy'])->name('destroy');
        Route::put('/{uuid}/customer/update', [TrashCanCustomerController::class, 'update'])->name('customer.update');

    });

    Route::prefix('trash-cans-map')->name('trash-cans-map.')->group(function () {

        Route::get('/', [TrashCanMapController::class, 'index'])->name('index');

    });

    Route::prefix('account')->name('auth.user.account.')->group(function () {

        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::put('/profile/update', [AccountController::class, 'profileUpdate'])->name('profile.update');
        Route::put('/password/update', [AccountController::class, 'passwordUpdate'])->name('password.update');

    });

    Route::prefix('products')->name('product.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/{uuid}', [ProductController::class, 'show'])->name('show');
        Route::get('/{uuid}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{uuid}/update', [ProductController::class, 'update'])->name('update');
        Route::delete('{uuid}', [ProductController::class, 'destroy'])->name('destroy');

    });

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
