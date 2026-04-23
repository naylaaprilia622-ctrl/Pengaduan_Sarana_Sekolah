<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSiswa
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('siswa_nis')) {
            return redirect('/login/siswa')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
