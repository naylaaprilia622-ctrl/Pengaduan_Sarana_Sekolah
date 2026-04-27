<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaAuthController extends Controller
{
    public function showLogin()
    {
        if (session('siswa_nis')) {
            return redirect('/siswa/dashboard');
        }
        return view('auth.login-siswa');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis'      => 'required|numeric',
            'password' => 'required|string',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();

        if (!$siswa || !Hash::check($request->password, $siswa->password)) {
            return back()->with('error', 'NIS atau password salah.')->withInput();
        }

        session()->put('siswa_nis', $siswa->nis);
        session()->put('siswa_nama', $siswa->nama);

        return redirect('/siswa/dashboard');
    }

    public function showRegister()
    {
        if (session('siswa_nis')) {
            return redirect('/siswa/dashboard');
        }
        return view('auth.register-siswa');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nis'                  => 'required|numeric|digits_between:4,8|unique:siswas,nis',
            'nama'                 => 'required|string|max:100',
            'kelas'                => 'required|string|max:10',
            'password'             => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ], [
            'nis.unique'           => 'NIS tersebut sudah terdaftar.',
            'nis.digits_between'   => 'NIS harus berupa angka 4-8 digit.',
            'password.min'         => 'Password minimal 6 karakter.',
            'password.confirmed'   => 'Konfirmasi password tidak cocok.',
        ]);

        Siswa::create([
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'kelas'    => $request->kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login/siswa')->with('success', 'Akun berhasil dibuat! Silakan login dengan NIS dan password Anda.');
    }

    public function logout(Request $request)
    {
        session()->forget(['siswa_nis', 'siswa_nama']);
        return redirect('/login/siswa')->with('success', 'Berhasil logout.');
    }
}
