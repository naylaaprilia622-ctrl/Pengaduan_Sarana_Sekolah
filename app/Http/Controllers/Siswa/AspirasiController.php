<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $nis   = session('siswa_nis');
        $query = Aspirasi::with(['kategori', 'inputAspirasi'])
            ->where('nis', $nis);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('id_kategori')) {
            $query->where('id_kategori', $request->id_kategori);
        }

        $aspirasis = $query->orderBy('created_at', 'desc')->paginate(10);
        $kategoris = Kategori::all();

        return view('siswa.aspirasi.index', compact('aspirasis', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('siswa.aspirasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'lokasi'      => 'required|string|max:50',
            'ket'         => 'required|string|max:255',
        ]);

        $nis = session('siswa_nis');

        $aspirasi = Aspirasi::create([
            'nis'         => $nis,
            'id_kategori' => $request->id_kategori,
            'status'      => 'Menunggu',
        ]);

        InputAspirasi::create([
            'id_aspirasi' => $aspirasi->id_aspirasi,
            'nis'         => $nis,
            'id_kategori' => $request->id_kategori,
            'lokasi'      => $request->lokasi,
            'ket'         => $request->ket,
        ]);

        return redirect('/siswa/aspirasi')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show($id)
    {
        $nis      = session('siswa_nis');
        $aspirasi = Aspirasi::with(['kategori', 'inputAspirasi'])
            ->where('nis', $nis)
            ->findOrFail($id);

        return view('siswa.aspirasi.show', compact('aspirasi'));
    }

    public function destroy($id)
    {
        $nis      = session('siswa_nis');
        $aspirasi = Aspirasi::where('nis', $nis)
            ->where('status', 'Menunggu')
            ->findOrFail($id);

        $aspirasi->delete();

        return redirect('/siswa/aspirasi')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
