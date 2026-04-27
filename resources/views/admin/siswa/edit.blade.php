@extends('layouts.admin')
@section('title', 'Edit Siswa')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Edit Siswa</h1>
        <p class="text-navy/80 text-sm mt-1">Update data siswa</p>
    </div>
    <a href="/admin/siswa"
        class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
        <form action="/admin/siswa/{{ $siswa->nis }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-navy mb-1">NIS <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-id-card"></i></span>
                    <input type="number" name="nis" value="{{ old('nis', $siswa->nis) }}" placeholder="Nomor Induk Siswa (maksimal 8 digit)" maxlength="8"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nis') border-red-400 @enderror">
                </div>
                @error('nis')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" placeholder="Nama lengkap siswa"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nama') border-red-400 @enderror">
                </div>
                @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-1">Kelas <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-chalkboard"></i></span>
                    <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" placeholder="Contoh: XII RPL 1" maxlength="10"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('kelas') border-red-400 @enderror">
                </div>
                @error('kelas')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit"
                    class="flex-1 bg-navy text-white rounded-lg px-4 py-2.5 text-sm hover:bg-brown transition font-medium">
                    <i class="fa-solid fa-save mr-2"></i>Update Siswa
                </button>
                <a href="/admin/siswa"
                    class="px-4 py-2.5 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection