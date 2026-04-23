@extends('layouts.admin')
@section('title', 'Manajemen Kategori')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Manajemen Kategori</h1>
        <p class="text-light-brown text-sm mt-1">Kelola kategori pengaduan yang tersedia untuk siswa</p>
    </div>
    <a href="/admin/kategori/tambah"
        class="inline-flex items-center gap-2 px-4 py-2 bg-brown text-white rounded-lg text-sm hover:bg-navy transition">
        <i class="fa-solid fa-plus"></i> Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="px-6 py-4 border-b border-light-brown/30">
        <p class="text-sm text-light-brown">Total: <span class="font-semibold text-navy">{{ $kategoris->total() }}</span> kategori</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nama Kategori</th>
                    <th class="px-4 py-3 text-center">Jml. Aspirasi</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($kategoris as $kat)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 font-mono text-navy">{{ $kat->id_kategori }}</td>
                    <td class="px-4 py-3 font-medium text-navy">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-navy/10 rounded-lg flex items-center justify-center">
                                <i class="fa-solid fa-tag text-navy text-xs"></i>
                            </div>
                            {{ $kat->ket_kategori }}
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-block px-2.5 py-1 bg-navy/10 text-navy rounded-full text-xs font-semibold">
                            {{ $kat->aspirasis()->count() }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/kategori/{{ $kat->id_kategori }}/edit"
                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700 transition">
                                <i class="fa-solid fa-pen"></i> Ubah
                            </a>
                            <form action="/admin/kategori/{{ $kat->id_kategori }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus kategori &quot;{{ $kat->ket_kategori }}&quot;? Aspirasi yang terkait akan terhapus juga.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700 transition">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-10 text-center text-light-brown">
                        <i class="fa-solid fa-tags text-4xl mb-2 block"></i>
                        Belum ada data kategori
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($kategoris->hasPages())
    <div class="px-6 py-4 border-t border-light-brown/30">{{ $kategoris->links() }}</div>
    @endif
</div>
@endsection