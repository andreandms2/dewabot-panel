<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; // <-- DIPINDAHKAN KE ATAS

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda bisa mendaftarkan rute web untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditetapkan ke grup middleware "web". Buat sesuatu yang hebat!
|
*/

// Rute ini akan melayani app.dewabot.com
Route::get('/', function () {
    return view('welcome');
});

// Rute ini HANYA akan melayani admin.dewabot.com
Route::domain('admin.dewabot.com')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});