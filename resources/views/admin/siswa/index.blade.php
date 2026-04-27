@extends('layouts.admin')
@section('title', 'Manajemen Siswa')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Manajemen Siswa</h1>
        <p class="text-navy/80 text-sm mt-1">Kelola akun siswa yang dapat mengakses sistem</p>
    </div>
    <a href="/admin/siswa/tambah"
        class="inline-flex items-center gap-2 px-4 py-2 bg-brown text-white rounded-lg text-sm hover:bg-navy transition">
        <i class="fa-solid fa-user-plus"></i> Tambah Siswa
    </a>
</div>

<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="px-6 py-4 border-b border-light-brown/30">
        <p class="text-sm text-navy/80">Total: <span class="font-semibold text-navy">{{ $siswas->total() }}</span> siswa</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">NIS</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Kelas</th>
                    <th class="px-4 py-3 text-center">Jml. Pengaduan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($siswas as $siswa)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 font-mono text-navy">{{ $siswa->nis }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $siswa->nama }}</td>
                    <td class="px-4 py-3 text-navy/70">{{ $siswa->kelas }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-block px-2.5 py-1 bg-navy/10 text-navy rounded-full text-xs font-semibold">
                            {{ $siswa->aspirasis_count }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <form action="/admin/siswa/{{ $siswa->nis }}" method="POST"
                            onsubmit="return confirm('Hapus siswa {{ $siswa->nama }}? Semua pengaduan miliknya juga akan terhapus.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700 transition">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-navy/70">
                        <i class="fa-solid fa-users text-4xl mb-2 block"></i>
                        Belum ada data siswa
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($siswas->hasPages())
    <div class="px-6 py-4 border-t border-light-brown/30">{{ $siswas->links() }}</div>
    @endif
</div>
@endsection