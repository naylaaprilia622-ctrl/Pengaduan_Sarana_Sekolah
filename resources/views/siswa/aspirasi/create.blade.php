@extends('layouts.siswa')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-navy">Buat Pengaduan Baru</h1>
    <p class="text-light-brown text-sm mt-1">Sampaikan pengaduan sarana sekolah Anda</p>
</div>

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
        <form action="/siswa/aspirasi" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-navy mb-2">
                    <i class="fa-solid fa-tag text-gold mr-1"></i> Kategori Pengaduan
                </label>
                <select name="id_kategori"
                    class="w-full border border-light-brown rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('id_kategori') border-red-400 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kat)
                    <option value="{{ $kat->id_kategori }}" {{ old('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                        {{ $kat->ket_kategori }}
                    </option>
                    @endforeach
                </select>
                @error('id_kategori')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-2">
                    <i class="fa-solid fa-location-dot text-gold mr-1"></i> Lokasi
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown">
                        <i class="fa-solid fa-map-pin"></i>
                    </span>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                        placeholder="Contoh: Toilet Lantai 2, Lab Komputer..."
                        maxlength="50"
                        class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('lokasi') border-red-400 @enderror">
                </div>
                @error('lokasi')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-navy mb-2">
                    <i class="fa-solid fa-align-left text-gold mr-1"></i> Keterangan / Deskripsi
                </label>
                <textarea name="ket" rows="4" maxlength="255"
                    placeholder="Jelaskan secara detail kondisi yang perlu dilaporkan..."
                    class="w-full border border-light-brown rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brown resize-none @error('ket') border-red-400 @enderror">{{ old('ket') }}</textarea>
                @error('ket')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="flex-1 bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pengaduan
                </button>
                <a href="/siswa/aspirasi"
                    class="px-5 py-2.5 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection