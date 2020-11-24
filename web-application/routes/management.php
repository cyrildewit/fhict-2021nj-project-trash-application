<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
