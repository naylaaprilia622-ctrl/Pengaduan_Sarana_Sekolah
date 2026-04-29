<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PengaduanSekolahController extends Controller
{
    public function index(Request $request)
    {
        $query = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi']);

        if ($request->filled('q')) {
            $term = $request->q;
            $query->where(function ($sub) use ($term) {
                $sub->where('id_aspirasi', 'like', "%{$term}%")
                    ->orWhereHas('kategori', fn($q) => $q->where('ket_kategori', 'like', "%{$term}%"))
                    ->orWhereHas('inputAspirasi', fn($q) => $q->where('lokasi', 'like', "%{$term}%")->orWhere('ket', 'like', "%{$term}%"));
            });
        }

        if ($request->filled('id_kategori')) {
            $query->where('id_kategori', $request->id_kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $kategoris = Kategori::all();

        return view('siswa.pengaduan-sekolah.index', compact('pengaduan', 'kategoris'));
    }
}
