@extends('layouts.admin')

@section('title', 'Edit Aspirasi')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Edit Status Aspirasi</h1>
        <p class="text-light-brown text-sm mt-1">ID: #{{ $aspirasi->id_aspirasi }}</p>
    </div>
    <a href="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}"
        class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    {{-- Form Edit --}}
    <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
        <h2 class="font-semibold text-navy mb-5">Update Status & Feedback</h2>

        <form action="/admin/aspirasi/{{ $aspirasi->id_aspirasi }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-sm font-medium text-navy mb-2">
                    <i class="fa-solid fa-circle-dot text-brown mr-1"></i> Status Aspirasi
                </label>
                <select name="status"
                    class="w-full border border-light-brown rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('status') border-red-400 @enderror">
                    @foreach($statusOptions as $s)
                    <option value="{{ $s }}" {{ old('status', $aspirasi->status) === $s ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                    @endforeach
                </select>
                @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-navy mb-2">
                    <i class="fa-solid fa-comment-dots text-brown mr-1"></i> Umpan Balik (Opsional)
                </label>
                <textarea name="feedback" rows="5"
                    placeholder="Tulis umpan balik untuk siswa..."
                    class="w-full border border-light-brown rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brown resize-none @error('feedback') border-red-400 @enderror">{{ old('feedback', $aspirasi->feedback) }}</textarea>
                @error('feedback')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- Info Aspirasi --}}
    <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
        <h2 class="font-semibold text-navy mb-5">Informasi Aspirasi</h2>
        <dl class="space-y-4">
            <div>
                <dt class="text-xs text-light-brown">Siswa</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->siswa->nama ?? '-' }} ({{ $aspirasi->siswa->kelas ?? '-' }})</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">NIS</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->siswa->nis ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">Kategori</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">Lokasi</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">Keterangan</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">Tanggal</dt>
                <dd class="font-medium text-navy mt-0.5">{{ $aspirasi->created_at->format('d F Y, H:i') }}</dd>
            </div>
            <div>
                <dt class="text-xs text-light-brown">Status Saat Ini</dt>
                <dd class="mt-1">
                    @include('components.badge-status', ['status' => $aspirasi->status])
                </dd>
            </div>
        </dl>
    </div>
</div>
@endsection