<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\SiswaAuthController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;

// Landing Page
Route::get('/', function (Request $request) {
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

    $aspirasis = $query->orderBy('created_at', 'desc')->paginate(8)->withQueryString();
    $kategoris = Kategori::all();

    return view('landing', compact('aspirasis', 'kategoris'));
});

// Auth Siswa (login only — register hanya via admin)
Route::get('/login/siswa',  [SiswaAuthController::class, 'showLogin']);
Route::post('/login/siswa', [SiswaAuthController::class, 'login']);

// Auth Admin
Route::get('/login/admin',  [AdminAuthController::class, 'showLogin']);
Route::post('/login/admin', [AdminAuthController::class, 'login']);

// Admin
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);

    // Aspirasi
    Route::get('/aspirasi',           [Admin\AspirasiController::class, 'index']);
    Route::get('/aspirasi/{id}/edit', [Admin\AspirasiController::class, 'edit']);
    Route::get('/aspirasi/{id}',      [Admin\AspirasiController::class, 'show']);
    Route::put('/aspirasi/{id}',      [Admin\AspirasiController::class, 'update']);

    // Manajemen Siswa
    Route::get('/siswa',         [Admin\SiswaController::class, 'index']);
    Route::get('/siswa/tambah',  [Admin\SiswaController::class, 'create']);
    Route::post('/siswa',        [Admin\SiswaController::class, 'store']);
    Route::get('/siswa/{nis}/edit', [Admin\SiswaController::class, 'edit']);
    Route::put('/siswa/{nis}',   [Admin\SiswaController::class, 'update']);
    Route::delete('/siswa/{nis}', [Admin\SiswaController::class, 'destroy']);

    // Manajemen Kategori
    Route::get('/kategori',         [Admin\KategoriController::class, 'index']);
    Route::get('/kategori/tambah',  [Admin\KategoriController::class, 'create']);
    Route::post('/kategori',        [Admin\KategoriController::class, 'store']);
    Route::get('/kategori/{id_kategori}/edit', [Admin\KategoriController::class, 'edit']);
    Route::put('/kategori/{id_kategori}',      [Admin\KategoriController::class, 'update']);
    Route::delete('/kategori/{id_kategori}',   [Admin\KategoriController::class, 'destroy']);

    Route::post('/logout', [AdminAuthController::class, 'logout']);
});

// Siswa
Route::prefix('siswa')->middleware('auth.siswa')->group(function () {
    Route::get('/dashboard', [Siswa\DashboardController::class, 'index']);

    Route::get('/aspirasi',           [Siswa\AspirasiController::class, 'index']);
    Route::get('/aspirasi/create',    [Siswa\AspirasiController::class, 'create']);
    Route::post('/aspirasi',          [Siswa\AspirasiController::class, 'store']);
    Route::get('/aspirasi/{id}',      [Siswa\AspirasiController::class, 'show']);
    Route::delete('/aspirasi/{id}',   [Siswa\AspirasiController::class, 'destroy']);

    Route::post('/logout', [SiswaAuthController::class, 'logout']);
});
