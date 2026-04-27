<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Pengaduan Sarana Sekolah</title>
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

    {{-- Sidebar --}}
    <aside class="fixed top-0 left-0 h-full w-64 bg-navy text-white flex flex-col z-50">
        {{-- Logo --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-navy/50">
            <div>
                <p class="font-bold text-cream text-sm leading-tight">Pengaduan Sarana</p>
                <p class="text-xs text-cream/80">Sekolah</p>
            </div>
        </div>

        {{-- Info Admin --}}
        <div class="px-6 py-4 border-b border-navy/50">
            <p class="text-xs text-light-brown">Login sebagai</p>
            <p class="text-sm font-semibold text-white">{{ session('admin_username', 'Admin') }}</p>
        </div>

        {{-- Navigasi --}}
        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="/admin/dashboard"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition
                      {{ request()->is('admin/dashboard') ? 'bg-brown text-white' : 'text-light-brown hover:bg-navy/50' }}">
                <i class="fa-solid fa-gauge w-4 text-center"></i> Dashboard
            </a>

            <a href="/admin/aspirasi"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition
                      {{ request()->is('admin/aspirasi*') ? 'bg-brown text-white' : 'text-light-brown hover:bg-navy/50' }}">
                <i class="fa-solid fa-list-check w-4 text-center"></i> Semua Aspirasi
            </a>

            <div class="border-t border-navy/50 my-2"></div>

            <a href="/admin/siswa"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition
                      {{ request()->is('admin/siswa*') ? 'bg-brown text-white' : 'text-light-brown hover:bg-navy/50' }}">
                <i class="fa-solid fa-users w-4 text-center"></i> Manajemen Siswa
            </a>

            <a href="/admin/kategori"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition
                      {{ request()->is('admin/kategori*') ? 'bg-brown text-white' : 'text-light-brown hover:bg-navy/50' }}">
                <i class="fa-solid fa-tags w-4 text-center"></i> Manajemen Kategori
            </a>
        </nav>

        {{-- Logout --}}
        <div class="px-3 py-4 border-t border-navy/50">
            <form action="/admin/logout" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm text-red-400 hover:bg-red-900/30 transition">
                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="ml-64 p-6 min-h-screen">
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