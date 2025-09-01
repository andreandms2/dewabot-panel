<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index()
{
    // 1. Ambil semua data worker dari database
    $workers = \App\Models\Worker::all();

    // 2. Kirim data '$workers' ke view (BAGIAN INI YANG PALING PENTING)
    return view('admin.dashboard', ['workers' => $workers]);
}

public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'required|ip',
            'port' => 'required|integer',
        ]);

        // Simpan data ke tabel 'workers'
        Worker::create([
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'port' => $request->port,
            'status' => 'offline', // Status default saat pertama kali dibuat
        ]);

        // Kembali ke halaman dasbor dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Worker berhasil ditambahkan!');
    }
}