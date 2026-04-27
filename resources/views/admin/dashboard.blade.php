@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
    /* Modern Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulseGlow {

        0%,
        100% {
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
        }

        50% {
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.8), 0 0 30px rgba(255, 215, 0, 0.6);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-pulse-glow {
        animation: pulseGlow 2s infinite;
    }

    .float {
        animation: float 3s ease-in-out infinite;
    }

    /* Glassmorphism Effect */
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Hover Effects */
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* Gradient Backgrounds */
    .gradient-bg {
        background: linear-gradient(135deg, #102C57 0%, #1a3a6e 50%, #5D4037 100%);
    }

    .gradient-text {
        background: linear-gradient(135deg, #D4AF37, #FFD700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Enhanced Stats Cards */
    .stats-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced Table */
    .modern-table {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background: rgba(212, 175, 55, 0.05);
        transform: scale(1.01);
    }
</style>
@endpush

@section('content')
<div class="mb-8 animate-fade-in-up">
    <h1 class="text-3xl font-bold gradient-text">Dashboard Admin</h1>
    <p class="text-navy/80 text-sm mt-2">Selamat datang, <span class="font-semibold text-navy">{{ session('admin_username') }}</span>!</p>
    <p class="text-navy/70 text-xs">Pantau dan kelola semua pengaduan siswa dengan mudah</p>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
    <div class="stats-card rounded-2xl p-6 flex items-center gap-4 animate-slide-in-left">
        <div class="w-16 h-16 bg-gradient-to-br from-navy to-blue-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-inbox text-white text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Total Aspirasi</p>
            <p class="text-3xl font-bold text-navy">{{ $statistik['total'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Semua pengaduan</p>
        </div>
    </div>

    <div class="stats-card rounded-2xl p-6 flex items-center gap-4 animate-slide-in-left" style="animation-delay: 0.1s">
        <div class="w-16 h-16 bg-gradient-to-br from-gold to-yellow-400 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-clock text-white text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Menunggu</p>
            <p class="text-3xl font-bold text-gold">{{ $statistik['menunggu'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Perlu perhatian</p>
        </div>
    </div>

    <div class="stats-card rounded-2xl p-6 flex items-center gap-4 animate-slide-in-right" style="animation-delay: 0.2s">
        <div class="w-16 h-16 bg-gradient-to-br from-brown to-orange-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-arrows-spin text-white text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Proses</p>
            <p class="text-3xl font-bold text-brown">{{ $statistik['proses'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Sedang dikerjakan</p>
        </div>
    </div>

    <div class="stats-card rounded-2xl p-6 flex items-center gap-4 animate-slide-in-right" style="animation-delay: 0.3s">
        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-circle-check text-white text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Selesai</p>
            <p class="text-3xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Telah diselesaikan</p>
        </div>
    </div>
</div>

{{-- Aspirasi Terbaru --}}
<div class="modern-table rounded-2xl shadow-xl border border-white/20 animate-fade-in-up">
    <div class="flex items-center justify-between px-8 py-6 border-b border-light-brown/30 bg-gradient-to-r from-navy to-brown">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-list-check text-gold text-xl"></i>
            <h2 class="font-bold text-white text-lg">Aspirasi Terbaru</h2>
        </div>
        <a href="/admin/aspirasi" class="text-sm text-gold hover:text-white transition-all duration-300 hover:scale-105 flex items-center gap-2">
            <i class="fa-solid fa-arrow-right"></i> Lihat Semua
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-navy to-brown text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">No</th>
                    <th class="px-6 py-4 text-left font-semibold">Siswa</th>
                    <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-4 text-left font-semibold">Lokasi</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/20">
                @forelse($aspirasiBaru as $index => $aspirasi)
                <tr class="hover:bg-gradient-to-r hover:from-gold/5 hover:to-transparent transition-all duration-300 card-hover">
                    <td class="px-6 py-4 text-navy/80 font-medium">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-navy">{{ $aspirasi->siswa->nama ?? '-' }}</td>
                    <td class="px-6 py-4 text-navy/70">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-6 py-4 text-navy/70">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-6 py-4 text-navy/70">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-navy to-brown text-white rounded-xl text-xs font-semibold hover:from-brown hover:to-navy transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fa-solid fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-navy/70">
                        <div class="flex flex-col items-center gap-3">
                            <i class="fa-solid fa-inbox text-5xl text-navy/30"></i>
                            <p class="text-lg">Belum ada aspirasi</p>
                            <p class="text-sm text-light-brown/70">Aspirasi baru akan muncul di sini</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection