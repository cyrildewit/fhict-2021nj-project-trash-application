<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

// Bijv. http://api.projecttrash.nl/v1/........

Route::prefix('v1')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/findByBarcode/{barcode}', [ProductController::class, 'showByBarcode']);
    });
});
