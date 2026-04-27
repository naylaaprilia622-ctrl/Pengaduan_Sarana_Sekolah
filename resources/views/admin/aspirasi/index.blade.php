@extends('layouts.admin')

@section('title', 'Daftar Aspirasi')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-navy">Daftar Aspirasi</h1>
    <p class="text-navy/80 text-sm mt-1">Kelola semua pengaduan siswa</p>
</div>

{{-- Filter --}}
<div class="bg-white rounded-xl shadow p-5 mb-6 border border-light-brown/30">
    <form action="/admin/aspirasi" method="GET" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
        <div>
            <label class="block text-xs font-medium text-navy mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                class="w-full border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
        </div>

        <div>
            <label class="block text-xs font-medium text-navy mb-1">Bulan</label>
            <select name="bulan" class="w-full border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Bulan</option>
                @php
                $namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                @endphp
                @foreach($filterBulan as $b)
                <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                    {{ $namaBulan[(int)$b - 1] }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs font-medium text-navy mb-1">Siswa</label>
            <select name="nis" class="w-full border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Siswa</option>
                @foreach($siswas as $siswa)
                <option value="{{ $siswa->nis }}" {{ request('nis') == $siswa->nis ? 'selected' : '' }}>
                    {{ $siswa->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs font-medium text-navy mb-1">Kategori</label>
            <select name="id_kategori" class="w-full border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kat)
                <option value="{{ $kat->id_kategori }}" {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                    {{ $kat->ket_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs font-medium text-navy mb-1">Status</label>
            <select name="status" class="w-full border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Status</option>
                @foreach(['Menunggu', 'Proses', 'Selesai'] as $s)
                <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 bg-navy text-white rounded-lg px-3 py-2 text-sm hover:bg-brown transition">
                <i class="fa-solid fa-filter"></i> Filter
            </button>
            <a href="/admin/aspirasi" class="px-3 py-2 border border-light-brown rounded-lg text-sm text-navy hover:bg-light-brown/30 transition">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
    </form>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="px-6 py-4 border-b border-light-brown/30">
        <p class="text-sm text-navy/80">Menampilkan <span class="font-semibold text-navy">{{ $aspirasis->total() }}</span> aspirasi</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Siswa</th>
                    <th class="px-4 py-3 text-left">Kelas</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($aspirasis as $i => $aspirasi)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasis->firstItem() + $i }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->siswa->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->siswa->kelas ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown max-w-xs truncate">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-navy text-white rounded-lg text-xs hover:bg-brown transition">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}/edit"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-brown text-white rounded-lg text-xs hover:bg-navy transition">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-10 text-center text-light-brown">
                        <i class="fa-solid fa-inbox text-4xl mb-2 block"></i>
                        Tidak ada aspirasi ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($aspirasis->hasPages())
    <div class="px-6 py-4 border-t border-light-brown/30">
        {{ $aspirasis->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection