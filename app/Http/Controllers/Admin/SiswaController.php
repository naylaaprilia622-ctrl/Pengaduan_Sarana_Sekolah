<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::withCount('aspirasis')->orderBy('nama')->paginate(15);
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'      => 'required|numeric|digits_between:4,8|unique:siswas,nis',
            'nama'     => 'required|string|max:100',
            'kelas'    => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'nis.unique'         => 'NIS tersebut sudah terdaftar.',
            'nis.digits_between' => 'NIS harus berupa angka 4-8 digit.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        Siswa::create([
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'kelas'    => $request->kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/siswa')->with('success', 'Akun siswa berhasil ditambahkan.');
    }

    public function edit($nis)
    {
        $siswa = Siswa::findOrFail($nis);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $nis)
    {
        $siswa = Siswa::findOrFail($nis);

        $request->validate([
            'nis'      => 'required|numeric|digits_between:4,8|unique:siswas,nis,' . $nis . ',nis',
            'nama'     => 'required|string|max:100',
            'kelas'    => 'required|string|max:10',
        ], [
            'nis.unique'         => 'NIS tersebut sudah digunakan siswa lain.',
            'nis.digits_between' => 'NIS harus berupa angka 4-8 digit.',
        ]);

        $siswa->update([
            'nis'   => $request->nis,
            'nama'  => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($nis)
    {
        $siswa = Siswa::findOrFail($nis);
        $siswa->delete();
        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
