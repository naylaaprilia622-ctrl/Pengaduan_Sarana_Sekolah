<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;

class DashboardController extends Controller
{
    public function index()
    {
        $statusOptions = ['Menunggu', 'Proses', 'Selesai'];

        $statistik = [
            'total'    => Aspirasi::count(),
            'menunggu' => Aspirasi::where('status', 'Menunggu')->count(),
            'proses'   => Aspirasi::where('status', 'Proses')->count(),
            'selesai'  => Aspirasi::where('status', 'Selesai')->count(),
        ];

        $aspirasiBaru = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('statistik', 'aspirasiBaru', 'statusOptions'));
    }
}
