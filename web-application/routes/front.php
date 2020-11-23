<?php

use Illuminate\Support\Facades\Route;
use App\Http\Front\HomeController;

Route::get('/', HomeController::class);
