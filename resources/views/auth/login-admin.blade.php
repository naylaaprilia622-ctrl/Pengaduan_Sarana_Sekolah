@extends('layouts.guest')

@section('title', 'Login Admin')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gold/20">

        {{-- Header --}}
        <div class="bg-navy px-8 py-8 text-center">
            <h1 class="text-white text-xl font-bold">Pengaduan Sarana Sekolah</h1>
            <p class="text-cream/80 text-sm mt-1">Portal Admin</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-8">
            <h2 class="text-navy text-lg font-semibold mb-6 text-center">Login Administrator</h2>

            @if(session('error'))
            <div class="mb-4 flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <form action="/login/admin" method="POST" class="space-y-5">
                @csrf

                {{-- USERNAME --}}
                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Username</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="username" value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('username') border-red-400 @enderror">
                    </div>
                    @error('username')
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
                            id="passwordAdmin"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full pl-10 pr-10 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('password') border-red-400 @enderror">

                        <!-- Icon Mata -->
                        <span
                            onclick="togglePasswordAdmin()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-light-brown">
                            <i id="eyeIconAdmin" class="fa-solid fa-eye"></i>
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
            <div class="mt-6 text-center">
                <a href="/login/siswa" class="text-sm text-brown hover:text-gold transition">
                    <i class="fa-solid fa-user-graduate mr-1"></i> Login sebagai Siswa
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT TOGGLE PASSWORD --}}
<script>
    function togglePasswordAdmin() {
        const password = document.getElementById("passwordAdmin");
        const icon = document.getElementById("eyeIconAdmin");

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
</script>

@endsection