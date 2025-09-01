<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Admin\DashboardController;

// Rute untuk Panel Admin
Route::domain('admin.dewabot.com')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});