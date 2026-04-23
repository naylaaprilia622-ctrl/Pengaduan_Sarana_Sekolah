<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_id')) {
            return redirect('/login/admin')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
