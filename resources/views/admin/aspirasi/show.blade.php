@extends('layouts.admin')

@section('title', 'Detail Aspirasi')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Detail Aspirasi</h1>
        <p class="text-light-brown text-sm mt-1">ID Aspirasi: #{{ $aspirasi->id_aspirasi }}</p>
    </div>
    <div class="flex gap-2">
        <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}/edit"
            class="inline-flex items-center gap-2 px-4 py-2 bg-brown text-white rounded-lg text-sm hover:bg-navy transition">
            <i class="fa-solid fa-pen-to-square"></i> Edit Status
        </a>
        <a href="/admin/aspirasi"
            class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Info Utama --}}
    <div class="lg:col-span-2 space-y-4">
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-4 pb-2 border-b">Informasi Pengaduan</h2>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <dt class="text-xs text-light-brown mb-1">Kategori</dt>
                    <dd class="font-medium text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-light-brown mb-1">Lokasi</dt>
                    <dd class="font-medium text-navy">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-xs text-light-brown mb-1">Keterangan / Deskripsi</dt>
                    <dd class="font-medium text-navy">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-light-brown mb-1">Tanggal Pengaduan</dt>
                    <dd class="font-medium text-navy">{{ $aspirasi->created_at->format('d F Y, H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-light-brown mb-1">Mulai Diproses</dt>
                    <dd class="font-medium {{ $aspirasi->diproses_at ? 'text-brown' : 'text-light-brown italic' }}">
                        {{ $aspirasi->diproses_at ? $aspirasi->diproses_at->format('d F Y, H:i') : 'Belum diproses' }}
                    </dd>
                </div>
                <div>
                    <dt class="text-xs text-light-brown mb-1">Diselesaikan</dt>
                    <dd class="font-medium {{ $aspirasi->diselesaikan_at ? 'text-green-700' : 'text-light-brown italic' }}">
                        {{ $aspirasi->diselesaikan_at ? $aspirasi->diselesaikan_at->format('d F Y, H:i') : 'Belum selesai' }}
                    </dd>
                </div>
            </dl>
        </div>

        {{-- Feedback --}}
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-3">Umpan Balik Admin</h2>
            @if($aspirasi->feedback)
            <div class="bg-navy/5 border border-navy/20 rounded-lg p-4 text-sm text-navy">
                <i class="fa-solid fa-comment-dots text-brown mr-2"></i>
                {{ $aspirasi->feedback }}
            </div>
            @else
            <p class="text-light-brown text-sm italic">Belum ada umpan balik dari admin.</p>
            @endif
        </div>
    </div>

    {{-- Sidebar Info Siswa & Status --}}
    <div class="space-y-4">
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-4 pb-2 border-b">Data Siswa</h2>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-brown/10 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-user-graduate text-brown text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold text-navy">{{ $aspirasi->siswa->nama ?? '-' }}</p>
                    <p class="text-xs text-light-brown">NIS: {{ $aspirasi->siswa->nis ?? '-' }}</p>
                </div>
            </div>
            <dl class="space-y-2">
                <div class="flex justify-between text-sm">
                    <dt class="text-light-brown">Kelas</dt>
                    <dd class="font-medium">{{ $aspirasi->siswa->kelas ?? '-' }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-4 pb-2 border-b">Status Pengaduan</h2>
            <div class="flex justify-center py-2">
                @include('components.badge-status', ['status' => $aspirasi->status])
            </div>

            {{-- Progress bar --}}
            @php
            $progress = ['Menunggu' => 33, 'Proses' => 66, 'Selesai' => 100];
            $pct = $progress[$aspirasi->status] ?? 0;
            @endphp
            <div class="mt-4">
                <div class="flex justify-between text-xs text-light-brown mb-1">
                    <span>Progres</span>
                    <span>{{ $pct }}%</span>
                </div>
                <div class="h-2 bg-light-brown/30 rounded-full overflow-hidden">
                    <div class="h-full rounded-full {{ $aspirasi->status === 'Selesai' ? 'bg-green-500' : 'bg-brown' }} transition-all"
                        style="width: {{ $pct }}%"></div>
                </div>
                <div class="flex justify-between text-xs text-light-brown mt-2">
                    <span>Menunggu</span>
                    <span>Proses</span>
                    <span>Selesai</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection