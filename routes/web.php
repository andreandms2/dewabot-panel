<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

// Cek domain apa yang sedang diakses oleh pengunjung
$host = request()->getHost();

// Jika domainnya adalah 'admin.dewabot.com', maka jalankan rute khusus admin
if ($host == 'admin.dewabot.com') {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Nanti semua rute untuk halaman admin lainnya kita letakkan di sini
    
} 
// Jika bukan, maka jalankan rute untuk aplikasi utama (app.dewabot.com)
else {
    Route::get('/', function () {
        return view('welcome');
    });
}