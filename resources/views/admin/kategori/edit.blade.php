@extends('layouts.admin')
@section('title', 'Ubah Kategori')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Ubah Kategori</h1>
        <p class="text-light-brown text-sm mt-1">Perbarui informasi kategori pengaduan</p>
    </div>
    <a href="/admin/kategori"
        class="inline-flex items-center gap-2 px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="flex items-center justify-center min-h-[400px]">
    <div class="max-w-lg w-full">
        <div class="bg-white rounded-xl shadow p-6 border border-light-brown/30">
            <form action="/admin/kategori/{{ $kategori->id_kategori }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-navy mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-brown"><i class="fa-solid fa-tag"></i></span>
                        <input type="text" name="ket_kategori" value="{{ old('ket_kategori', $kategori->ket_kategori) }}" placeholder="Contoh: Kebersihan, Keamanan, Fasilitas"
                            class="w-full pl-10 pr-4 py-2.5 border border-light-brown rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brown @error('ket_kategori') border-red-400 @enderror">
                    </div>
                    @error('ket_kategori')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-brown hover:bg-navy text-white font-semibold py-2.5 rounded-lg transition text-sm">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="/admin/kategori"
                        class="flex-1 bg-light-brown/20 hover:bg-light-brown/30 text-navy font-semibold py-2.5 rounded-lg transition text-sm text-center">
                        <i class="fa-solid fa-xmark mr-2"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection