<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $nis   = session('siswa_nis');
        $siswa = Siswa::findOrFail($nis);

        $statistik = [
            'total'    => Aspirasi::where('nis', $nis)->count(),
            'menunggu' => Aspirasi::where('nis', $nis)->where('status', 'Menunggu')->count(),
            'proses'   => Aspirasi::where('nis', $nis)->where('status', 'Proses')->count(),
            'selesai'  => Aspirasi::where('nis', $nis)->where('status', 'Selesai')->count(),
        ];

        $aspirasiBaru = Aspirasi::with(['kategori', 'inputAspirasi'])
            ->where('nis', $nis)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('siswa.dashboard', compact('siswa', 'statistik', 'aspirasiBaru'));
    }
}
