<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $nis   = session('siswa_nis');
        $siswa = Siswa::findOrFail($nis);

        $statistik = [
            'total'    => Aspirasi::where('nis', $nis)->count(),
            'menunggu' => Aspirasi::where('nis', $nis)->where('status', 'Menunggu')->count(),
            'proses'   => Aspirasi::where('nis', $nis)->where('status', 'Proses')->count(),
            'selesai'  => Aspirasi::where('nis', $nis)->where('status', 'Selesai')->count(),
        ];

        $statusOptions = ['Menunggu', 'Proses', 'Selesai'];
        $kategoris = Kategori::all();

        $aspirasiQuery = Aspirasi::with(['kategori', 'inputAspirasi'])
            ->where('nis', $nis);

        if ($request->filled('q')) {
            $term = $request->q;
            $aspirasiQuery->where(function ($query) use ($term) {
                $query->whereHas('kategori', function ($query) use ($term) {
                    $query->where('ket_kategori', 'like', "%{$term}%");
                })
                    ->orWhereHas('inputAspirasi', function ($query) use ($term) {
                        $query->where('lokasi', 'like', "%{$term}%")
                            ->orWhere('ket', 'like', "%{$term}%");
                    });
            });
        }

        if ($request->filled('id_kategori')) {
            $aspirasiQuery->where('id_kategori', $request->id_kategori);
        }

        if ($request->filled('status')) {
            $aspirasiQuery->where('status', $request->status);
        }

        $aspirasiBaru = $aspirasiQuery
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Data pengaduan publik untuk section beranda dengan filter
        $aspirasisPublikQuery = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi']);

        // Filter untuk pengaduan publik
        if ($request->filled('publik_q')) {
            $term = $request->publik_q;
            $aspirasisPublikQuery->where(function ($query) use ($term) {
                $query->whereHas('siswa', function ($query) use ($term) {
                    $query->where('nama', 'like', "%{$term}%");
                })
                    ->orWhereHas('kategori', function ($query) use ($term) {
                        $query->where('ket_kategori', 'like', "%{$term}%");
                    })
                    ->orWhereHas('inputAspirasi', function ($query) use ($term) {
                        $query->where('lokasi', 'like', "%{$term}%")
                            ->orWhere('ket', 'like', "%{$term}%");
                    });
            });
        }

        if ($request->filled('publik_id_kategori')) {
            $aspirasisPublikQuery->where('id_kategori', $request->publik_id_kategori);
        }

        if ($request->filled('publik_status')) {
            $aspirasisPublikQuery->where('status', $request->publik_status);
        }

        $aspirasisPublik = $aspirasisPublikQuery
            ->orderBy('created_at', 'desc')
            ->paginate(8)
            ->appends($request->query()); // Menjaga parameter filter di pagination

        return view('siswa.dashboard', compact('siswa', 'statistik', 'aspirasiBaru', 'statusOptions', 'kategoris', 'aspirasisPublik'));
    }
}
