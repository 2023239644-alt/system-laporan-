<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Staff\DashboardController;

Route::get('/staff/dashboard', [DashboardController::class, 'index']);