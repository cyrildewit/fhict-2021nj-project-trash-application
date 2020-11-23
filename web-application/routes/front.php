<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\Auth\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
