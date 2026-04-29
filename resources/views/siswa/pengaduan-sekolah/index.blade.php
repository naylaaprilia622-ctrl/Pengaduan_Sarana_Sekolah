@extends('layouts.siswa')
@section('title', 'Daftar Pengaduan Sekolah')
@section('content')

<div class="mb-6">
    <div>
        <h1 class="text-2xl font-bold text-navy">Daftar Pengaduan Sekolah</h1>
        <p class="text-navy/80 text-sm mt-1">Lihat semua pengaduan dari seluruh siswa sekolah</p>
    </div>
</div>

{{-- Filter --}}
<div class="bg-white rounded-xl shadow p-4 mb-5 border border-light-brown/30">
    <form action="/siswa/pengaduan-sekolah" method="GET" class="grid gap-4 lg:grid-cols-4">
        <div>
            <label class="block text-xs font-medium text-navy mb-1">Pencarian</label>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari kategori, lokasi, atau kata kunci"
                class="w-full border border-light-brown rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown" />
        </div>
        <div>
            <label class="block text-xs font-medium text-navy mb-1">Kategori</label>
            <select name="id_kategori" class="w-full border border-light-brown rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
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
            <select name="status" class="w-full border border-light-brown rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Status</option>
                <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="w-full px-4 py-2 bg-navy text-white rounded-lg text-sm hover:bg-brown transition font-medium">
                <i class="fa-solid fa-filter mr-1"></i> Filter
            </button>
            @if(request('q') || request('id_kategori') || request('status'))
            <a href="/siswa/pengaduan-sekolah" class="w-full px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition text-center font-medium">
                <i class="fa-solid fa-xmark mr-1"></i> Reset
            </a>
            @endif
        </div>
    </form>
</div>

<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="px-6 py-4 border-b border-light-brown/30">
        <p class="text-sm text-navy/80">Total: <span class="font-semibold text-navy">{{ $pengaduan->total() }}</span> pengaduan</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">NIS</th>
                    <th class="px-4 py-3 text-left">Nama Siswa</th>
                    <th class="px-4 py-3 text-left">Kelas</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($pengaduan as $i => $aspirasi)
                <tr class="hover:bg-light-brown/10 transition">
                    <td class="px-4 py-3 text-navy/80">{{ $pengaduan->firstItem() + $i }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->nis }}</td>
                    <td class="px-4 py-3 text-navy/70">{{ $aspirasi->siswa->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-navy/70">{{ $aspirasi->siswa->kelas ?? '-' }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-4 py-3 text-navy/70">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3 text-navy/70 max-w-xs truncate">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @if($aspirasi->status === 'Selesai')
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                            <i class="fa-solid fa-circle-check mr-1"></i> {{ $aspirasi->status }}
                        </span>
                        @elseif($aspirasi->status === 'Proses')
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">
                            <i class="fa-solid fa-arrows-spin mr-1"></i> {{ $aspirasi->status }}
                        </span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-800 rounded-full">
                            <i class="fa-solid fa-clock mr-1"></i> {{ $aspirasi->status }}
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-navy/70 text-xs">{{ $aspirasi->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-8 text-center text-navy/70">
                        <i class="fa-solid fa-inbox text-2xl text-navy/30 mb-3 block"></i>
                        Tidak ada pengaduan yang cocok dengan filter.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pengaduan->hasPages())
    <div class="px-6 py-4 border-t border-light-brown/30">
        {{ $pengaduan->links() }}
    </div>
    @endif
</div>

@endsection