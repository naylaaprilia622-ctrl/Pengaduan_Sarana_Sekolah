<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_id')) {
            return redirect('/admin/dashboard');
        }
        return view('auth.login-admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Username atau password salah.')->withInput();
        }

        session()->put('admin_id', $admin->id);
        session()->put('admin_username', $admin->username);

        return redirect('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        session()->forget(['admin_id', 'admin_username']);
        return redirect('/login/admin')->with('success', 'Berhasil logout.');
    }
}
