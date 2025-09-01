<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
	// Ambil semua data worker dari database
	$workers = Worker::all();	

	 // Kirim data 'workers' ke view
        return view('admin.dashboard');
    }
}