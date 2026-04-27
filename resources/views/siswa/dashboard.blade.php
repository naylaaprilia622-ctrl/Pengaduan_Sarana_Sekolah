@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

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

    /* Enhanced Quick Action Button */
    .quick-action-btn {
        background: linear-gradient(135deg, #5D4037 0%, #102C57 100%);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.3);
    }

    .quick-action-btn:hover {
        background: linear-gradient(135deg, #102C57 0%, #5D4037 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(93, 64, 55, 0.4);
    }
</style>
@endpush

@section('content')
<div class="mb-8 animate-fade-in-up">
    <h1 class="text-3xl font-bold gradient-text">Dashboard Siswa</h1>
    <p class="text-navy/80 text-sm mt-2">Selamat datang, <span class="font-semibold text-navy">{{ $siswa->nama }}</span>!</p>
    <p class="text-navy/70 text-xs">NIS: <span class="font-medium">{{ $siswa->nis }}</span> | Kelas: <span class="font-medium">{{ $siswa->kelas }}</span></p>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="stats-card rounded-2xl p-5 flex items-center gap-4 animate-slide-in-left">
        <div class="w-14 h-14 bg-gradient-to-br from-navy to-blue-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-inbox text-white text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Total</p>
            <p class="text-2xl font-bold text-navy">{{ $statistik['total'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Pengaduan saya</p>
        </div>
    </div>
    <div class="stats-card rounded-2xl p-5 flex items-center gap-4 animate-slide-in-left" style="animation-delay: 0.1s">
        <div class="w-14 h-14 bg-gradient-to-br from-gold to-yellow-400 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-clock text-white text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Menunggu</p>
            <p class="text-2xl font-bold text-gold">{{ $statistik['menunggu'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Perlu perhatian</p>
        </div>
    </div>
    <div class="stats-card rounded-2xl p-5 flex items-center gap-4 animate-slide-in-right" style="animation-delay: 0.2s">
        <div class="w-14 h-14 bg-gradient-to-br from-brown to-orange-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-arrows-spin text-white text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Proses</p>
            <p class="text-2xl font-bold text-brown">{{ $statistik['proses'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Sedang dikerjakan</p>
        </div>
    </div>
    <div class="stats-card rounded-2xl p-5 flex items-center gap-4 animate-slide-in-right" style="animation-delay: 0.3s">
        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-glow">
            <i class="fa-solid fa-circle-check text-white text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-navy/80 font-medium">Selesai</p>
            <p class="text-2xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
            <p class="text-xs text-navy/70 mt-1">Telah diselesaikan</p>
        </div>
    </div>
</div>

{{-- Quick Action --}}
<div class="mb-8 animate-fade-in-up">
    <a href="/siswa/aspirasi/create"
        class="quick-action-btn inline-flex items-center gap-3 px-6 py-4 text-white rounded-2xl font-bold text-lg hover:scale-105 transition-all duration-300">
        <i class="fa-solid fa-plus text-gold text-xl"></i>
        <span>Buat Pengaduan Baru</span>
        <i class="fa-solid fa-arrow-right text-gold"></i>
    </a>
</div>

{{-- Pengaduan Terbaru --}}
<div class="modern-table rounded-2xl shadow-xl border border-white/20 animate-fade-in-up">
    <div class="px-8 py-6 border-b border-light-brown/30 bg-gradient-to-r from-navy to-brown">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-list-check text-gold text-xl"></i>
                <h2 class="font-bold text-white text-lg">Pengaduan Terbaru Saya</h2>
            </div>
            <p class="text-sm text-gold/80">Filter berdasarkan status, kategori, atau kata kunci.</p>
            <a href="/siswa/aspirasi" class="text-sm text-gold hover:text-white transition-all duration-300 hover:scale-105 flex items-center gap-2">
                <i class="fa-solid fa-arrow-right"></i> Lihat Semua
            </a>
        </div>

        <form id="dashboard-filter-form" action="/siswa/dashboard" method="GET" class="grid gap-4 lg:grid-cols-4 mt-6">
            <div class="card-hover">
                <label class="block text-xs font-medium text-white mb-2">Cari</label>
                <input id="dashboard-search-input" type="search" name="q" value="{{ request('q') }}" placeholder="Kategori, lokasi, atau deskripsi"
                    class="w-full border border-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold bg-white/90 backdrop-blur-sm" />
            </div>
            <div class="card-hover">
                <label class="block text-xs font-medium text-white mb-2">Kategori</label>
                <select id="dashboard-category-select" name="id_kategori"
                    class="w-full border border-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold bg-white/90 backdrop-blur-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kat)
                    <option value="{{ $kat->id_kategori }}" {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>{{ $kat->ket_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-hover">
                <label class="block text-xs font-medium text-white mb-2">Status</label>
                <select id="dashboard-status-select" name="status"
                    class="w-full border border-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold bg-white/90 backdrop-blur-sm">
                    <option value="">Semua Status</option>
                    @foreach($statusOptions as $s)
                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="w-full px-5 py-3 rounded-xl bg-gradient-to-r from-gold to-yellow-400 text-navy text-sm font-semibold hover:from-yellow-400 hover:to-gold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fa-solid fa-filter mr-2"></i> Filter
                </button>
                <button id="dashboard-reset-button" type="button" class="w-full px-5 py-3 rounded-xl bg-white/90 backdrop-blur-sm border border-white/30 text-navy text-sm font-semibold hover:bg-white/80 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fa-solid fa-xmark mr-2"></i> Reset
                </button>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-navy to-brown text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">No</th>
                    <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-4 text-left font-semibold">Lokasi</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-center font-semibold">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/20">
                @forelse($aspirasiBaru as $i => $aspirasi)
                <tr class="hover:bg-gradient-to-r hover:from-gold/5 hover:to-transparent transition-all duration-300 card-hover">
                    <td class="px-6 py-4 text-navy/80 font-medium">{{ $i + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-6 py-4 text-navy/70">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-6 py-4 text-navy/70">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="/siswa/aspirasi/{{ $aspirasi->id_aspirasi }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-navy to-brown text-white rounded-xl text-xs font-semibold hover:from-brown hover:to-navy transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fa-solid fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-light-brown">
                        <div class="flex flex-col items-center gap-3">
                            <i class="fa-solid fa-inbox text-5xl text-light-brown/50"></i>
                            <p class="text-lg">Belum ada pengaduan</p>
                            <p class="text-sm text-light-brown/70">Belum ada pengaduan. <a href="/siswa/aspirasi/create" class="text-brown hover:text-gold font-medium">Buat sekarang</a></p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Daftar Pengaduan Publik --}}
<div class="mt-12 animate-fade-in-up">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-navy mb-2">Daftar Pengaduan Sekolah</h2>
        <p class="text-navy/80 text-sm">Lihat semua pengaduan yang telah diajukan siswa lainnya</p>
    </div>

    <div class="modern-table rounded-2xl shadow-xl border border-white/20">
        <div class="px-8 py-6 border-b border-light-brown/30 bg-gradient-to-r from-navy to-brown">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-school text-gold text-xl"></i>
                    <h3 class="font-bold text-white text-lg">Pengaduan Terbaru</h3>
                </div>
                <p class="text-sm text-gold/80">Semua pengaduan dari seluruh siswa</p>
                <a href="/" class="text-sm text-gold hover:text-white transition-all duration-300 hover:scale-105 flex items-center gap-2">
                    <i class="fa-solid fa-arrow-right"></i> Lihat Beranda
                </a>
            </div>
        </div>

        {{-- Search & Filter Form --}}
        <div class="px-8 py-6 bg-gradient-to-r from-cream to-gold/10 border-b border-light-brown/30">
            <div class="flex flex-col lg:flex-row gap-4 items-center">
                {{-- Search Input --}}
                <div class="flex-1 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                        <i class="fa-solid fa-search"></i>
                    </span>
                    <input type="text" id="publik-search-input"
                        placeholder="Cari nama siswa, kategori, lokasi, atau detail..."
                        value="{{ request('publik_q') }}"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown focus:border-transparent">
                </div>

                {{-- Category Filter --}}
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown text-xs">
                        <i class="fa-solid fa-tag"></i>
                    </span>
                    <select id="publik-category-select" class="pl-8 pr-8 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown focus:border-transparent appearance-none bg-white">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" {{ request('publik_id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->ket_kategori }}
                        </option>
                        @endforeach
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-light-brown pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </span>
                </div>

                {{-- Status Filter --}}
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown text-xs">
                        <i class="fa-solid fa-info-circle"></i>
                    </span>
                    <select id="publik-status-select" class="pl-8 pr-8 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown focus:border-transparent appearance-none bg-white">
                        <option value="">Semua Status</option>
                        @foreach($statusOptions as $status)
                        <option value="{{ $status }}" {{ request('publik_status') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-light-brown pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </span>
                </div>

                {{-- Reset Button --}}
                <button type="button" id="publik-reset-button"
                    class="px-6 py-2.5 bg-gradient-to-r from-brown to-navy text-white rounded-lg text-sm font-semibold hover:from-navy hover:to-brown transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                    <i class="fa-solid fa-rotate-right"></i>
                    Reset
                </button>
            </div>
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
                    </tr>
                </thead>
                <tbody class="divide-y divide-light-brown/20">
                    @forelse($aspirasisPublik ?? [] as $index => $aspirasi)
                    <tr class="hover:bg-gradient-to-r hover:from-gold/5 hover:to-transparent transition-all duration-300 card-hover">
                        <td class="px-6 py-4 text-navy/80 font-medium">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-semibold text-navy">{{ $aspirasi->siswa->nama ?? '-' }}</td>
                        <td class="px-6 py-4 text-navy/70">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                        <td class="px-6 py-4 text-navy/70">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @include('components.badge-status', ['status' => $aspirasi->status])
                        </td>
                        <td class="px-6 py-4 text-navy/70">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-navy/70">
                            <div class="flex flex-col items-center gap-3">
                                <i class="fa-solid fa-inbox text-5xl text-navy/30"></i>
                                <p class="text-lg">Belum ada pengaduan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($aspirasisPublik) && $aspirasisPublik->hasPages())
        <div class="px-6 py-4 border-t border-light-brown/30 flex justify-center">
            {{ $aspirasisPublik->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("publik-search-input");
        const categorySelect = document.getElementById("publik-category-select");
        const statusSelect = document.getElementById("publik-status-select");
        const resetButton = document.getElementById("publik-reset-button");

        let searchTimeout;

        function updatePublikFilters() {
            const params = new URLSearchParams(window.location.search);
            const query = searchInput.value.trim();
            const category = categorySelect.value;
            const status = statusSelect.value;

            if (query) {
                params.set("publik_q", query);
            } else {
                params.delete("publik_q");
            }

            if (category) {
                params.set("publik_id_kategori", category);
            } else {
                params.delete("publik_id_kategori");
            }

            if (status) {
                params.set("publik_status", status);
            } else {
                params.delete("publik_status");
            }

            params.delete("page");

            const queryString = params.toString();
            const newUrl = queryString ? "/siswa/dashboard?" + queryString : "/siswa/dashboard";

            window.history.pushState({}, "", newUrl);
            window.location.reload();
        }

        searchInput.addEventListener("input", () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(updatePublikFilters, 500);
        });

        categorySelect.addEventListener("change", updatePublikFilters);
        statusSelect.addEventListener("change", updatePublikFilters);

        resetButton.addEventListener("click", () => {
            searchInput.value = "";
            categorySelect.value = "";
            statusSelect.value = "";
            window.location.href = "/siswa/dashboard";
        });

        function highlightActiveFilters() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has("publik_q") || urlParams.has("publik_id_kategori") || urlParams.has("publik_status")) {
                resetButton.classList.add("ring-2", "ring-gold", "ring-opacity-50");
            }
        }

        highlightActiveFilters();
    });
</script>