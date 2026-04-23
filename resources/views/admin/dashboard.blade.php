@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-navy">Dashboard</h1>
    <p class="text-light-brown text-sm mt-1">Selamat datang, {{ session('admin_username') }}!</p>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 border border-light-brown/30">
        <div class="w-14 h-14 bg-navy/10 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-inbox text-navy text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-light-brown">Total Aspirasi</p>
            <p class="text-3xl font-bold text-navy">{{ $statistik['total'] }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 border border-light-brown/30">
        <div class="w-14 h-14 bg-gold/20 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-clock text-gold text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-light-brown">Menunggu</p>
            <p class="text-3xl font-bold text-gold">{{ $statistik['menunggu'] }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 border border-light-brown/30">
        <div class="w-14 h-14 bg-brown/10 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-arrows-spin text-brown text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-light-brown">Proses</p>
            <p class="text-3xl font-bold text-brown">{{ $statistik['proses'] }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 border border-light-brown/30">
        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-circle-check text-green-600 text-2xl"></i>
        </div>
        <div>
            <p class="text-sm text-light-brown">Selesai</p>
            <p class="text-3xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
        </div>
    </div>
</div>

{{-- Aspirasi Terbaru --}}
<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="flex items-center justify-between px-6 py-4 border-b border-light-brown/30">
        <h2 class="font-semibold text-navy">Aspirasi Terbaru</h2>
        <a href="/admin/aspirasi" class="text-sm text-brown hover:text-gold">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Siswa</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($aspirasiBaru as $index => $aspirasi)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 text-light-brown">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->siswa->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}"
                            class="inline-flex items-center gap-1 px-3 py-1.5 bg-navy text-white rounded-lg text-xs hover:bg-brown transition">
                            <i class="fa-solid fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-light-brown">
                        <i class="fa-solid fa-inbox text-3xl mb-2 block"></i>
                        Belum ada aspirasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection