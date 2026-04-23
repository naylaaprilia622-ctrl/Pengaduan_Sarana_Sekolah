<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::orderBy('ket_kategori')->paginate(15);
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ket_kategori' => 'required|string|max:100|unique:kategoris,ket_kategori',
        ], [
            'ket_kategori.required' => 'Nama kategori harus diisi.',
            'ket_kategori.unique'   => 'Kategori tersebut sudah ada.',
            'ket_kategori.max'      => 'Nama kategori maksimal 100 karakter.',
        ]);

        Kategori::create([
            'ket_kategori' => $request->ket_kategori,
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);

        $request->validate([
            'ket_kategori' => 'required|string|max:100|unique:kategoris,ket_kategori,' . $id_kategori . ',id_kategori',
        ], [
            'ket_kategori.required' => 'Nama kategori harus diisi.',
            'ket_kategori.unique'   => 'Kategori tersebut sudah ada.',
            'ket_kategori.max'      => 'Nama kategori maksimal 100 karakter.',
        ]);

        $kategori->update([
            'ket_kategori' => $request->ket_kategori,
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diubah.');
    }

    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
