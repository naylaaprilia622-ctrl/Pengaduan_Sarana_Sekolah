@extends('layouts.siswa')
@section('title', 'Riwayat Pengaduan')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-navy">Riwayat Pengaduan Saya</h1>
        <p class="text-light-brown text-sm mt-1">Semua pengaduan yang pernah Anda buat</p>
    </div>
    <a href="/siswa/aspirasi/create"
        class="inline-flex items-center gap-2 px-4 py-2 bg-brown text-white rounded-lg text-sm hover:bg-navy transition">
        <i class="fa-solid fa-plus"></i> Buat Baru
    </a>
</div>

{{-- Filter --}}
<div class="bg-white rounded-xl shadow p-4 mb-5 border border-light-brown/30">
    <form action="/siswa/aspirasi" method="GET" class="flex flex-wrap gap-3 items-end">
        <div>
            <label class="block text-xs font-medium text-navy mb-1">Status</label>
            <select name="status" class="border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Status</option>
                @foreach(['Menunggu','Proses','Selesai'] as $s)
                <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-medium text-navy mb-1">Kategori</label>
            <select name="id_kategori" class="border border-light-brown rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kat)
                <option value="{{ $kat->id_kategori }}" {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                    {{ $kat->ket_kategori }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-navy text-white rounded-lg text-sm hover:bg-brown transition">
            <i class="fa-solid fa-filter mr-1"></i> Filter
        </button>
        @if(request('status') || request('id_kategori'))
        <a href="/siswa/aspirasi" class="px-4 py-2 border border-light-brown text-navy rounded-lg text-sm hover:bg-light-brown/30 transition">
            <i class="fa-solid fa-xmark mr-1"></i> Reset
        </a>
        @endif
    </form>
</div>

<div class="bg-white rounded-xl shadow border border-light-brown/30">
    <div class="px-6 py-4 border-b border-light-brown/30">
        <p class="text-sm text-light-brown">Total: <span class="font-semibold text-navy">{{ $aspirasis->total() }}</span> pengaduan</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-navy text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Waktu Pengaduan</th>
                    <th class="px-4 py-3 text-left">Feedback</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-light-brown/30">
                @forelse($aspirasis as $i => $aspirasi)
                <tr class="hover:bg-light-brown/20 transition">
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasis->firstItem() + $i }}</td>
                    <td class="px-4 py-3 font-medium text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                    <td class="px-4 py-3 text-light-brown">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @include('components.badge-status', ['status' => $aspirasi->status])
                    </td>
                    <td class="px-4 py-3 text-light-brown text-xs">
                        <div><i class="fa-solid fa-clock mr-1 text-light-brown"></i>{{ $aspirasi->created_at->format('d/m/Y H:i') }}</div>
                        @if($aspirasi->diproses_at)
                        <div class="mt-0.5 text-brown"><i class="fa-solid fa-arrows-spin mr-1"></i>{{ $aspirasi->diproses_at->format('d/m/Y H:i') }}</div>
                        @endif
                        @if($aspirasi->diselesaikan_at)
                        <div class="mt-0.5 text-green-600"><i class="fa-solid fa-circle-check mr-1"></i>{{ $aspirasi->diselesaikan_at->format('d/m/Y H:i') }}</div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-light-brown">
                        @if($aspirasi->feedback)
                        <span class="text-green-700 text-xs"><i class="fa-solid fa-circle-check mr-1"></i>Ada</span>
                        @else
                        <span class="text-light-brown text-xs">Belum ada</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/siswa/aspirasi/{{ $aspirasi->id_aspirasi }}"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-navy text-white rounded-lg text-xs hover:bg-brown transition">
                                <i class="fa-solid fa-eye"></i> Detail
                            </a>
                            @if($aspirasi->status === 'Menunggu')
                            <form action="/siswa/aspirasi/{{ $aspirasi->id_aspirasi }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700 transition">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-10 text-center text-light-brown">
                        <i class="fa-solid fa-inbox text-4xl mb-2 block"></i>
                        Belum ada pengaduan.
                        <a href="/siswa/aspirasi/create" class="text-brown hover:text-gold">Buat sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($aspirasis->hasPages())
    <div class="px-6 py-4 border-t border-light-brown/30">{{ $aspirasis->withQueryString()->links() }}</div>
    @endif
</div>
@endsection