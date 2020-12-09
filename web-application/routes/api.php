<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DiscardedWasteRecordController;
use App\Http\Controllers\Api\UserDiscardedWasteRecordController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\User\AuthController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {

        Route::prefix('user')->group(function () {
            Route::post('login', [AuthController::class, 'login']);
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh', [AuthController::class, 'refresh']);
            Route::post('me', [AuthController::class, 'me']);
        });

    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/findByBarcode/{barcode}', [ProductController::class, 'showByBarcode']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('findByNFC/{nfc}/discarded-waste-records', [UserDiscardedWasteRecordController::class, 'store']);
    });

    Route::prefix('discarded-waste-records')->group(function () {
        Route::post('/', [DiscardedWasteRecordController::class, 'store']);
    });
});
