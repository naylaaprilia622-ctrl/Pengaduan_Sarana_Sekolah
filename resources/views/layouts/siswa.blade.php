<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Siswa') — Pengaduan Sarana Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#102C57',
                        brown: '#5D4037',
                        'light-brown': '#C4A484',
                        gold: '#D4AF37',
                        cream: '#F5F0EB'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-light-brown/20 min-h-screen">

    {{-- Top Navbar --}}
    <nav class="bg-white shadow-md sticky top-0 z-50 border-b border-light-brown/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Kiri: Logo --}}
                <div class="flex items-center gap-2">
                    <span class="font-bold text-navy text-sm">Pengaduan Sarana Sekolah</span>
                </div>

                {{-- Menu Tengah --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="/siswa/dashboard"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm transition
                              {{ request()->is('siswa/dashboard') ? 'bg-navy text-white' : 'text-navy hover:bg-light-brown/30' }}">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                    <a href="/siswa/aspirasi"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm transition
                              {{ request()->is('siswa/aspirasi') ? 'bg-navy text-white' : 'text-navy hover:bg-light-brown/30' }}">
                        <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Saya
                    </a>
                    <a href="/siswa/pengaduan-sekolah"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm transition
                              {{ request()->is('siswa/pengaduan-sekolah') ? 'bg-navy text-white' : 'text-navy hover:bg-light-brown/30' }}">
                        <i class="fa-solid fa-list-check"></i> Daftar Pengaduan
                    </a>
                </div>

                {{-- Kanan: User + Logout --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 text-sm text-navy">
                        <i class="fa-solid fa-user-circle text-navy text-xl"></i>
                        <span class="hidden sm:block font-medium">{{ session('siswa_nama', 'Siswa') }}</span>
                    </div>
                    <form action="/siswa/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-1 px-3 py-1.5 bg-brown text-white rounded-lg text-sm hover:bg-navy transition">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="hidden sm:block">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="md:hidden border-t border-light-brown/30 flex">
            <a href="/siswa/dashboard" class="flex-1 flex flex-col items-center py-2 text-xs text-navy hover:text-brown">
                <i class="fa-solid fa-house mb-1"></i> Dashboard
            </a>
            <a href="/siswa/aspirasi" class="flex-1 flex flex-col items-center py-2 text-xs text-navy hover:text-brown">
                <i class="fa-solid fa-clock-rotate-left mb-1"></i> Riwayat
            </a>
            <a href="/siswa/pengaduan-sekolah" class="flex-1 flex flex-col items-center py-2 text-xs text-navy hover:text-brown">
                <i class="fa-solid fa-list-check mb-1"></i> Daftar
            </a>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="mb-4 flex items-center gap-2 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="mb-4 flex items-center gap-2 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        @yield('content')
    </main>

    {{-- Scroll to Top --}}
    <button id="scrollTop"
        onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-6 right-6 z-50 w-11 h-11 bg-navy text-white rounded-full shadow-lg
                   flex items-center justify-center hover:bg-brown transition opacity-0 pointer-events-none">
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <script>
        const btn = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                btn.classList.remove('opacity-0', 'pointer-events-none');
                btn.classList.add('opacity-100');
            } else {
                btn.classList.add('opacity-0', 'pointer-events-none');
                btn.classList.remove('opacity-100');
            }
        });
    </script>
</body>

</html>