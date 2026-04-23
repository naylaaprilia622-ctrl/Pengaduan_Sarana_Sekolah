@extends('layouts.siswa')
@section('title', 'Detail Pengaduan')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Detail Pengaduan</h1>
        <p class="text-light-brown text-sm mt-1">ID: #{{ $aspirasi->id_aspirasi }}</p>
    </div>
    <div class="flex gap-2">
        @if($aspirasi->status === 'Menunggu')
        <form action="/siswa/aspirasi/{{ $aspirasi->id_aspirasi }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700 transition">
                <i class="fa-solid fa-trash"></i> Hapus
            </button>
        </form>
        @endif
        <a href="/siswa/aspirasi"
            class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-5xl">

    {{-- Kolom Utama --}}
    <div class="lg:col-span-2 space-y-4">

        {{-- Info Pengaduan --}}
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-4 pb-2 border-b">Informasi Pengaduan</h2>
            <dl class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs text-light-brown mb-1">Kategori</dt>
                        <dd class="font-medium text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-light-brown mb-1">Lokasi</dt>
                        <dd class="font-medium text-navy">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</dd>
                    </div>
                </div>
                <div>
                    <dt class="text-xs text-light-brown mb-1">Keterangan / Deskripsi</dt>
                    <dd class="text-navy bg-light-brown/20 rounded-lg p-3 text-sm">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</dd>
                </div>
            </dl>
        </div>

        {{-- Feedback --}}
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-3">
                <i class="fa-solid fa-comment-dots text-brown mr-2"></i>Umpan Balik Admin
            </h2>
            @if($aspirasi->feedback)
            <div class="bg-navy/5 border border-navy/20 rounded-lg p-4 text-sm text-navy">
                {{ $aspirasi->feedback }}
            </div>
            @else
            <div class="bg-light-brown/20 rounded-lg p-4 text-sm text-light-brown italic text-center">
                <i class="fa-solid fa-clock mr-1"></i> Menunggu umpan balik dari admin...
            </div>
            @endif
        </div>
    </div>

    {{-- Kolom Kanan: Status & Progres --}}
    <div class="space-y-4">
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <h2 class="font-semibold text-navy mb-4 pb-2 border-b">Status Saat Ini</h2>
            <div class="flex justify-center py-2">
                @include('components.badge-status', ['status' => $aspirasi->status])
            </div>

            @php
            $steps = ['Menunggu', 'Proses', 'Selesai'];
            $currentIndex = array_search($aspirasi->status, $steps);
            $pct = [0 => 33, 1 => 66, 2 => 100][$currentIndex] ?? 0;
            @endphp

            {{-- Progress bar --}}
            <div class="mt-5">
                <div class="flex justify-between text-xs text-light-brown mb-1">
                    <span>Progres</span><span>{{ $pct }}%</span>
                </div>
                <div class="h-2.5 bg-light-brown/30 rounded-full overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-500
                                {{ $aspirasi->status === 'Selesai' ? 'bg-green-500' : 'bg-brown' }}"
                        style="width: {{ $pct }}%"></div>
                </div>
            </div>

            {{-- Step indicator --}}
            <div class="mt-6 space-y-3">
                @foreach($steps as $idx => $step)
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                                {{ $idx < $currentIndex ? 'bg-green-500 text-white' : ($idx === $currentIndex ? 'bg-brown text-white' : 'bg-light-brown/30 text-light-brown') }}">
                        @if($idx < $currentIndex)
                            <i class="fa-solid fa-check text-xs"></i>
                            @else
                            <span class="text-xs font-bold">{{ $idx + 1 }}</span>
                            @endif
                    </div>
                    <div>
                        <p class="text-sm font-medium {{ $idx <= $currentIndex ? 'text-navy' : 'text-light-brown' }}">{{ $step }}</p>
                        @if($idx === 0 && $aspirasi->created_at)
                        <p class="text-xs text-light-brown">{{ $aspirasi->created_at->format('d/m/Y H:i') }}</p>
                        @elseif($idx === 1 && $aspirasi->diproses_at)
                        <p class="text-xs text-light-brown">{{ $aspirasi->diproses_at->format('d/m/Y H:i') }}</p>
                        @elseif($idx === 2 && $aspirasi->diselesaikan_at)
                        <p class="text-xs text-light-brown">{{ $aspirasi->diselesaikan_at->format('d/m/Y H:i') }}</p>
                        @endif
                    </div>
                </div>
                @if($idx < count($steps) - 1)
                    <div class="ml-4 w-0.5 h-3 {{ $idx < $currentIndex ? 'bg-green-400' : 'bg-light-brown/30' }}">
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection