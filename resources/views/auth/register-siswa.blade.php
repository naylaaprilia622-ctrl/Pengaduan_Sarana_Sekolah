@extends('layouts.guest')

@section('title', 'Daftar Siswa')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gold/20">

        {{-- Header --}}
        <div class="bg-navy px-8 py-7 text-center">
            <h1 class="text-white text-xl font-bold">Pengaduan Sarana Sekolah</h1>
            <p class="text-cream/80 text-sm mt-1">Daftar Akun Siswa</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-7">
            <h2 class="text-navy text-lg font-semibold mb-5 text-center">Buat Akun Baru</h2>

            @if(session('error'))
            <div class="mb-4 flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <form action="/daftar" method="POST" class="space-y-4">
                @csrf

                {{-- NIS --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">NIS <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-id-card"></i>
                        </span>
                        <input type="number" name="nis" value="{{ old('nis') }}" maxlength="8"
                            placeholder="Masukkan NIS Anda (maksimal 8 digit)"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nis') border-red-400 bg-red-50 @enderror">
                    </div>
                    @error('nis')
                    <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nama') border-red-400 bg-red-50 @enderror">
                    </div>
                    @error('nama')
                    <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kelas --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Kelas <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-chalkboard"></i>
                        </span>
                        <input type="text" name="kelas" value="{{ old('kelas') }}"
                            placeholder="Contoh: XII RPL 1"
                            maxlength="10"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('kelas') border-red-400 bg-red-50 @enderror">
                    </div>
                    @error('kelas')
                    <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Password <span class="text-red-500">*</span></label>
                    <div class="relative">

                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-lock"></i>
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 6 karakter"
                            class="w-full pl-10 pr-10 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('password') border-red-400 bg-red-50 @enderror">

                        <span onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-light-brown">
                            <i id="eyeIcon" class="fa-solid fa-eye"></i>
                        </span>

                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <div class="relative">

                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-lock"></i>
                        </span>

                        <input
                            type="password"
                            id="confirmPassword"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            class="w-full pl-10 pr-10 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown">

                        <span onclick="toggleConfirmPassword()" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-light-brown">
                            <i id="eyeIconConfirm" class="fa-solid fa-eye"></i>
                        </span>

                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm mt-2">
                    <i class="fa-solid fa-user-plus mr-2"></i> Daftar Sekarang
                </button>
            </form>

            <div class="mt-5 text-center text-sm text-navy">
                Sudah punya akun?
                <a href="/login/siswa" class="text-brown font-medium hover:text-gold ml-1">
                    Masuk di sini
                </a>
            </div>

            <div class="mt-2 text-center">
                <a href="/" class="text-xs text-light-brown hover:text-gold transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    function togglePassword() {
        const input = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }

    function toggleConfirmPassword() {
        const input = document.getElementById("confirmPassword");
        const icon = document.getElementById("eyeIconConfirm");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>

@endsection