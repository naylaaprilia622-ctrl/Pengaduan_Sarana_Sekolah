@extends('layouts.admin')
@section('title', 'Tambah Siswa')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Tambah Siswa</h1>
        <p class="text-light-brown text-sm mt-1">Daftarkan akun siswa baru</p>
    </div>
    <a href="/admin/siswa"
        class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
        <form action="/admin/siswa" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-navy mb-1">NIS <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-id-card"></i></span>
                    <input type="number" name="nis" value="{{ old('nis') }}" placeholder="Nomor Induk Siswa"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nis') border-red-400 @enderror">
                </div>
                @error('nis')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap siswa"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nama') border-red-400 @enderror">
                </div>
                @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Kelas <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-chalkboard"></i></span>
                    <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XII RPL 1" maxlength="10"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('kelas') border-red-400 @enderror">
                </div>
                @error('kelas')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Minimal 6 karakter"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('password') border-red-400 @enderror">
                </div>
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                </div>
            </div>

            <button type="submit"
                class="w-full bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm mt-2">
                <i class="fa-solid fa-user-plus mr-2"></i> Tambah Siswa
            </button>
        </form>
    </div>
</div>
@endsection