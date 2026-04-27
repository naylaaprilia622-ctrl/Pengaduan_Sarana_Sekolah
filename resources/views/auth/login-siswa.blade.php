@extends('layouts.guest')

@section('title', 'Login Siswa')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gold/20">

        {{-- Header --}}
        <div class="bg-navy px-8 py-8 text-center">
            <h1 class="text-white text-xl font-bold">Pengaduan Sarana Sekolah</h1>
            <p class="text-cream/80 text-sm mt-1">Portal Siswa</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-8">
            <h2 class="text-navy text-lg font-semibold mb-6 text-center">Login Siswa</h2>

            @if(session('error'))
            <div class="mb-4 flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            @if(session('success'))
            <div class="mb-4 flex items-center gap-2 bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg text-sm">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <form action="/login/siswa" method="POST" class="space-y-5">
                @csrf

                {{-- NIS --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">NIS</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-id-card"></i>
                        </span>
                        <input type="number" name="nis" value="{{ old('nis') }}"
                            placeholder="Masukkan NIS" maxlength="8"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('nis') border-red-400 @enderror">
                    </div>
                    @error('nis')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Password</label>
                    <div class="relative">

                        <!-- Icon Lock -->
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-lock"></i>
                        </span>

                        <!-- Input -->
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full pl-10 pr-10 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('password') border-red-400 @enderror">

                        <!-- Icon Mata -->
                        <span
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-light-brown">
                            <i id="eyeIcon" class="fa-solid fa-eye"></i>
                        </span>

                    </div>

                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <button type="submit"
                    class="w-full bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
                </button>
            </form>

            {{-- FOOTER --}}
            <div class="mt-3 flex items-center justify-center gap-4 text-xs text-light-brown">
                <a href="/" class="hover:text-gold transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Beranda
                </a>
                <span>•</span>
                <a href="/login/admin" class="hover:text-gold transition">
                    <i class="fa-solid fa-user-shield mr-1"></i> Login Admin
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT TOGGLE PASSWORD --}}
<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (password.type === "password") {
            password.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            password.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    // Script untuk membatasi input NIS maksimal 8 digit
    document.addEventListener('DOMContentLoaded', function() {
        const nisInput = document.querySelector('input[name="nis"]');

        nisInput.addEventListener('input', function(e) {
            // Jika panjang nilai sudah 8 karakter, cegah input lebih lanjut
            if (this.value.length > 8) {
                this.value = this.value.slice(0, 8);
            }
        });

        nisInput.addEventListener('keydown', function(e) {
            // Jika panjang sudah 8 karakter dan bukan backspace/delete/arrow keys, cegah input
            if (this.value.length >= 8 &&
                e.key !== 'Backspace' &&
                e.key !== 'Delete' &&
                e.key !== 'ArrowLeft' &&
                e.key !== 'ArrowRight' &&
                e.key !== 'Tab' &&
                !e.ctrlKey && !e.metaKey) {
                e.preventDefault();
            }
        });

        nisInput.addEventListener('paste', function(e) {
            // Tangani paste untuk memastikan maksimal 8 karakter
            setTimeout(() => {
                if (this.value.length > 8) {
                    this.value = this.value.slice(0, 8);
                }
            }, 0);
        });
    });
</script>

@endsection