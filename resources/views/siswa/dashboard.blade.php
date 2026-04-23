@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-navy">Dashboard</h1>
    <p class="text-light-brown text-sm mt-1">Selamat datang, <span class="font-semibold text-navy">{{ $siswa->nama }}</span>!</p>
    <p class="text-light-brown text-xs">NIS: {{ $siswa->nis }} | Kelas: {{ $siswa->kelas }}</p>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-3 border border-light-brown/30">
        <div class="w-12 h-12 bg-navy/10 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-inbox text-navy text-xl"></i>
        </div>
        <div>
            <p class="text-xs text-light-brown">Total</p>
            <p class="text-2xl font-bold text-navy">{{ $statistik['total'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-3 border border-light-brown/30">
        <div class="w-12 h-12 bg-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-clock text-gold text-xl"></i>
        </div>
        <div>
            <p class="text-xs text-light-brown">Menunggu</p>
            <p class="text-2xl font-bold text-gold">{{ $statistik['menunggu'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-3 border border-light-brown/30">
        <div class="w-12 h-12 bg-brown/10 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-arrows-spin text-brown text-xl"></i>
        </div>
        <div>
            <p class="text-xs text-light-brown">Proses</p>
            <p class="text-2xl font-bold text-brown">{{ $statistik['proses'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-5 flex items-center gap-3 border border-light-brown/30">
        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>
        </div>
        <div>
            <p class="text-xs text-light-brown">Selesai</p>
            <p class="text-2xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
        </div>
    </div>
</div>

{{-- Quick Action --}}
<div class="mb-6">
    <a href="/siswa/aspirasi/create"
        class="inline-flex items-center gap-2 px-5 py-3 bg-brown text-white rounded-xl font-medium hover:bg-navy transition shadow">
        <i class="fa-solid fa-plus"></i> Buat Pengaduan Baru
    </a>
</div>

{{-- Pengaduan Terbaru --}}
<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="flex items-center justify-between px-6 py-4 border-b border-light-brown/30">
        <h2 class="font-semibold text-navy">Pengaduan Terbaru Saya</h2>
        <a href="/siswa/aspirasi" class="text-sm text-brown hover:text-gold">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-center">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($aspirasiBaru as $i => $aspirasi)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 text-light-brown">{{ $i + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="/siswa/aspirasi/{{ $aspirasi->id_aspirasi }}"
                            class="inline-flex items-center gap-1 px-3 py-1.5 bg-navy text-white rounded-lg text-xs hover:bg-brown transition">
                            <i class="fa-solid fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-10 text-center text-light-brown">
                        <i class="fa-solid fa-inbox text-4xl mb-2 block"></i>
                        Belum ada pengaduan. <a href="/siswa/aspirasi/create" class="text-brown hover:text-gold">Buat sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection