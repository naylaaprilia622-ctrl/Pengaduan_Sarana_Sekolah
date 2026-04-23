<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    protected array $statusOptions = ['Menunggu', 'Proses', 'Selesai'];

    public function index(Request $request)
    {
        $query = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi']);

        $query = $this->applyFilters($query, $request);

        $aspirasis  = $query->orderBy('created_at', 'desc')->paginate(10);
        $siswas     = Siswa::orderBy('nama')->get();
        $kategoris  = Kategori::all();
        $filterBulan = $this->getFilterBulan();

        return view('admin.aspirasi.index', compact(
            'aspirasis', 'siswas', 'kategoris', 'filterBulan'
        ));
    }

    public function show($id)
    {
        $aspirasi = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi'])
            ->findOrFail($id);

        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi    = Aspirasi::with(['siswa', 'kategori', 'inputAspirasi'])->findOrFail($id);
        $statusOptions = $this->statusOptions;

        return view('admin.aspirasi.edit', compact('aspirasi', 'statusOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status'   => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'nullable|string|max:1000',
        ]);

        $aspirasi    = Aspirasi::findOrFail($id);
        $statusLama  = $aspirasi->status;
        $statusBaru  = $request->status;

        $updateData = [
            'status'   => $statusBaru,
            'feedback' => $request->feedback,
        ];

        if ($statusBaru === 'Proses' && $statusLama !== 'Proses') {
            $updateData['diproses_at'] = now();
        }

        if ($statusBaru === 'Selesai' && $statusLama !== 'Selesai') {
            $updateData['diselesaikan_at'] = now();
            if (!$aspirasi->diproses_at) {
                $updateData['diproses_at'] = now();
            }
        }

        $aspirasi->update($updateData);

        return redirect("/admin/aspirasi/{$id}")
            ->with('success', 'Status dan feedback berhasil diperbarui.');
    }

    private function applyFilters($query, Request $request)
    {
        if ($request->filled('tanggal')) {
            $query->whereDate('aspirasis.created_at', $request->tanggal);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('aspirasis.created_at', $request->bulan);
        }

        if ($request->filled('nis')) {
            $query->where('aspirasis.nis', $request->nis);
        }

        if ($request->filled('id_kategori')) {
            $query->where('aspirasis.id_kategori', $request->id_kategori);
        }

        if ($request->filled('status')) {
            $query->where('aspirasis.status', $request->status);
        }

        return $query;
    }

    private function getFilterBulan(): array
    {
        return array_map(
            fn($m) => str_pad($m, 2, '0', STR_PAD_LEFT),
            range(1, 12)
        );
    }
}
