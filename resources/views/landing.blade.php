<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Sarana Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#102C57',
                        brown: '#5D4037',
                        'light-brown': '#C4A484',
                        gold: '#D4AF37',
                        cream: '#F5F0EB'
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-light-brown/20 font-sans">

    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-md border-b border-light-brown/30">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-navy rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-school text-gold text-lg"></i>
                </div>
                <div>
                    <p class="font-bold text-navy text-sm leading-tight">Pengaduan Sarana</p>
                    <p class="text-xs text-light-brown leading-tight">Sekolah</p>
                </div>
            </div>

            {{-- Menu Tengah --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#tentang" class="text-navy hover:text-brown font-semibold text-sm transition">
                    Tentang
                </a>
                <a href="#daftar-pengaduan" class="text-navy hover:text-brown font-semibold text-sm transition">
                    Daftar Pengaduan
                </a>
            </div>

            {{-- Tombol Kanan --}}
            <div class="flex items-center gap-3">
                <a href="/login/siswa"
                    class="px-5 py-2.5 bg-brown text-white font-semibold text-sm rounded-lg hover:bg-navy transition shadow-lg">
                    <i class="fa-solid fa-right-to-bracket mr-1.5"></i>Masuk
                </a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="min-h-screen bg-gradient-to-br from-navy via-[#1a3a6e] to-brown flex items-center pt-16">
        <div class="max-w-6xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Teks --}}
            <div class="text-white">
                <span class="inline-block bg-gold/20 text-gold text-xs font-medium px-3 py-1 rounded-full mb-6 border border-gold/30">
                    <i class="fa-solid fa-crown mr-1"></i> Sistem Pengaduan Digital
                </span>
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    Sampaikan Pengaduan<br>
                    <span class="text-gold">Sarana Sekolah</span><br>
                    dengan Mudah
                </h1>
                <p class="text-light-brown text-lg leading-relaxed mb-8 max-w-lg">
                    Platform digital untuk melaporkan kondisi sarana dan prasarana sekolah.
                    Pengaduan Anda akan diproses dan dipantau secara transparan.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/login/siswa"
                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-gold text-navy font-bold rounded-xl hover:bg-white transition shadow-lg text-sm">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
                    </a>
                </div>
            </div>

            {{-- Card Ilustrasi --}}
            <div class="hidden lg:flex flex-col gap-4">
                {{-- Card besar --}}
                <div class="bg-white rounded-2xl p-6 shadow-2xl border border-gold/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gold/20 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-clock text-gold"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-navy text-sm">Kerusakan Proyektor</p>
                                <p class="text-xs text-light-brown">Lab Komputer • Fasilitas</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-gold/20 text-gold text-xs font-medium rounded-full">
                            Menunggu
                        </span>
                    </div>
                    <div class="h-2 bg-light-brown rounded-full">
                        <div class="h-2 bg-gold rounded-full w-1/3"></div>
                    </div>
                    <p class="text-xs text-light-brown mt-2">Progres: 33%</p>
                </div>

                {{-- Card kecil kanan --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-navy/80 border border-gold/30 rounded-2xl p-5 text-white text-center">
                        <p class="text-3xl font-bold text-gold">10</p>
                        <p class="text-sm text-light-brown mt-1">Total Pengaduan</p>
                    </div>
                    <div class="bg-white rounded-2xl p-5 text-center border border-gold/20">
                        <div class="flex items-center gap-2 mb-2 justify-center">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-circle-check text-green-600 text-sm"></i>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-navy">3</p>
                        <p class="text-xs text-light-brown">Selesai</p>
                    </div>
                </div>

                {{-- Card proses --}}
                <div class="bg-white rounded-2xl p-5 shadow-xl flex items-center gap-4 border border-gold/20">
                    <div class="w-11 h-11 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-navy text-sm">Kursi Kelas XII RPL</p>
                        <p class="text-xs text-light-brown">Sudah diganti dengan yang baru</p>
                    </div>
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Selesai</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur --}}
    <section class="py-20 bg-light-brown/20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-navy mb-3">Cara Kerja Sistem</h2>
                <p class="text-light-brown max-w-xl mx-auto">Proses pengaduan yang sederhana, transparan, dan terpantau dari awal hingga selesai.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm text-center hover:shadow-lg transition border border-light-brown/30">
                    <div class="w-16 h-16 bg-navy/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-file-pen text-navy text-2xl"></i>
                    </div>
                    <div class="w-7 h-7 bg-navy text-gold rounded-full flex items-center justify-center text-sm font-bold mx-auto mb-4">1</div>
                    <h3 class="font-bold text-navy text-lg mb-2">Buat Pengaduan</h3>
                    <p class="text-light-brown text-sm leading-relaxed">
                        Daftar akun lalu isi formulir pengaduan dengan memilih kategori, lokasi, dan deskripsi masalah.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm text-center hover:shadow-lg transition border border-light-brown/30">
                    <div class="w-16 h-16 bg-gold/20 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-gears text-gold text-2xl"></i>
                    </div>
                    <div class="w-7 h-7 bg-navy text-gold rounded-full flex items-center justify-center text-sm font-bold mx-auto mb-4">2</div>
                    <h3 class="font-bold text-navy text-lg mb-2">Diproses Admin</h3>
                    <p class="text-light-brown text-sm leading-relaxed">
                        Admin memverifikasi dan memproses pengaduan, lalu memberikan umpan balik perkembangan penanganan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm text-center hover:shadow-lg transition border border-light-brown/30">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-circle-check text-green-600 text-2xl"></i>
                    </div>
                    <div class="w-7 h-7 bg-navy text-gold rounded-full flex items-center justify-center text-sm font-bold mx-auto mb-4">3</div>
                    <h3 class="font-bold text-navy text-lg mb-2">Pantau & Selesai</h3>
                    <p class="text-light-brown text-sm leading-relaxed">
                        Pantau progres penanganan secara real-time hingga pengaduan dinyatakan selesai.
                    </p>
                </div>
            </div>
        </div>
    </section>



    {{-- Tentang --}}
    <section id="tentang" class="py-20 bg-light-brown/10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-navy mb-3">Tentang Sistem</h2>
                <p class="text-light-brown max-w-2xl mx-auto">Platform inovatif yang memudahkan siswa melaporkan masalah sarana sekolah dengan cepat dan transparan.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-2 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-navy mb-4">Fitur Utama</h3>
                    <ul class="space-y-4 text-light-brown">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-3 w-3 rounded-full bg-navy"></span>
                            <div>
                                <p class="font-semibold text-navy">Transparan</p>
                                <p class="text-sm">Pantau status pengaduan dari awal hingga selesai dengan mudah.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-3 w-3 rounded-full bg-navy"></span>
                            <div>
                                <p class="font-semibold text-navy">Cepat</p>
                                <p class="text-sm">Kelola dan proses pengaduan dengan sistem yang efisien.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-3 w-3 rounded-full bg-navy"></span>
                            <div>
                                <p class="font-semibold text-navy">Mudah</p>
                                <p class="text-sm">Filter pengaduan berdasarkan kategori dan status untuk kemudahan pencarian.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-light-brown/30">
                    <div class="w-16 h-16 bg-navy rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-info text-gold text-2xl"></i>
                    </div>
                    <p class="text-center text-light-brown">
                        Sistem ini dirancang untuk memfasilitasi komunikasi antara siswa dan admin sekolah dalam menangani masalah sarana dan prasarana.
                    </p>
                </div>
            </div>
        </div>
    </section>



    @if(isset($aspirasis))
    {{-- Tabel Pengaduan Publik --}}
    <section id="daftar-pengaduan" class="py-20 bg-light-brown/10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-navy mb-3">Daftar Pengaduan</h2>
                <p class="text-light-brown max-w-2xl mx-auto">Lihat seluruh pengaduan yang masuk. Guest hanya dapat melihat dan memfilter, sementara aksi edit/hapus hanya untuk pengguna terautentikasi.</p>
            </div>

            <div class="grid gap-4 lg:grid-cols-3 mb-4" id="filter-form">
                <div>
                    <label class="block text-sm font-semibold text-navy mb-2">Pencarian</label>
                    <input type="search" id="search-input" value="{{ request('q') }}" placeholder="Cari kategori, lokasi, atau kata kunci"
                        class="w-full border border-light-brown rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brown" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-navy mb-2">Kategori</label>
                    <select id="kategori-select" class="w-full border border-light-brown rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kat)
                        <option value="{{ $kat->id_kategori }}" {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>{{ $kat->ket_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-navy mb-2">Status</label>
                    <select id="status-select" class="w-full border border-light-brown rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brown">
                        <option value="">Semua Status</option>
                        <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-end mb-6">
                <button id="filter-button" class="px-6 py-3 bg-navy text-white rounded-xl text-sm font-semibold hover:bg-brown transition">
                    <i class="fa-solid fa-filter mr-2"></i>Filter
                </button>
                <button id="reset-button" class="px-6 py-3 border border-light-brown rounded-xl text-sm font-semibold text-navy hover:bg-light-brown/30 transition">
                    <i class="fa-solid fa-xmark mr-2"></i>Reset
                </button>
            </div>

            <div class="overflow-x-auto bg-white rounded-3xl shadow-sm border border-light-brown/30">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-navy text-white rounded-t-3xl">
                        <tr>
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Kategori</th>
                            <th class="px-4 py-4">Lokasi</th>
                            <th class="px-4 py-4">Keterangan</th>
                            <th class="px-4 py-4">Status</th>
                            <th class="px-4 py-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-light-brown/30">
                        @forelse($aspirasis as $i => $aspirasi)
                        <tr class="hover:bg-light-brown/10 transition">
                            <td class="px-4 py-4 text-light-brown">{{ $aspirasis->firstItem() + $i }}</td>
                            <td class="px-4 py-4 font-semibold text-navy">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</td>
                            <td class="px-4 py-4 text-light-brown">{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
                            <td class="px-4 py-4 text-light-brown max-w-xl truncate">{{ $aspirasi->inputAspirasi->ket ?? '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $aspirasi->status === 'Selesai' ? 'bg-green-100 text-green-800' : ($aspirasi->status === 'Proses' ? 'bg-yellow-100 text-yellow-800' : 'bg-orange-100 text-orange-800') }}">
                                    {{ $aspirasi->status }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-light-brown">{{ $aspirasi->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-light-brown">Tidak ada pengaduan yang cocok dengan filter.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between text-sm text-light-brown">
                <p>Menampilkan <span class="font-semibold text-navy">{{ $aspirasis->total() }}</span> pengaduan</p>
                @if($aspirasis->hasPages())
                <div class="flex flex-wrap gap-2">
                    {{ $aspirasis->withQueryString()->links() }}
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 bg-navy">
        <div class="max-w-2xl mx-auto px-6 text-center">
            <i class="fa-solid fa-bullhorn text-gold text-4xl mb-5"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Sampaikan Pengaduan Anda</h2>
            <p class="text-light-brown mb-8">Daftar sekarang secara gratis dan mulai laporkan kondisi sarana sekolah yang perlu diperbaiki.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/login/siswa"
                    class="px-8 py-3.5 bg-gold text-navy font-bold rounded-xl hover:bg-white transition shadow-lg">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i>Masuk Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-navy py-8 border-t border-gold/30">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-school text-gold"></i>
                <span class="text-white font-semibold text-sm">Pengaduan Sarana Sekolah</span>
            </div>
            <p class="text-light-brown text-sm">UKK SMK Rekayasa Perangkat Lunak — KM25.4.1.1 Paket 3</p>
            <a href="/login/admin" class="text-light-brown hover:text-gold text-xs transition">
                <i class="fa-solid fa-user-shield mr-1"></i>Admin
            </a>
        </div>
    </footer>

    {{-- Scroll to Top Button --}}
    <button id="scrollTopBtn" class="fixed bottom-6 right-6 z-40 w-12 h-12 bg-navy text-gold rounded-full shadow-xl hover:bg-brown transition opacity-0 invisible"
        title="Kembali ke atas">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <script>
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
                scrollTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
                scrollTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Scroll to table when pagination page is clicked
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('page') && urlParams.get('page') !== '1') {
                const tableSection = document.getElementById('daftar-pengaduan');
                if (tableSection) {
                    setTimeout(() => {
                        tableSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
            }

            // Live search functionality
            const searchInput = document.getElementById('search-input');
            const kategoriSelect = document.getElementById('kategori-select');
            const statusSelect = document.getElementById('status-select');
            const filterButton = document.getElementById('filter-button');
            const resetButton = document.getElementById('reset-button');
            const tableContainer = document.querySelector('.overflow-x-auto');
            const paginationContainer = document.querySelector('.flex.flex-wrap.gap-2');
            const totalText = document.querySelector('p.font-semibold.text-navy');

            let searchTimeout;

            function attachPaginationListeners() {
                const paginationLinks = document.querySelectorAll('.flex.flex-wrap.gap-2 a');
                paginationLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const url = new URL(this.href);
                        const page = url.searchParams.get('page');

                        const params = new URLSearchParams();
                        const q = searchInput.value;
                        const id_kategori = kategoriSelect.value;
                        const status = statusSelect.value;

                        if (q) params.append('q', q);
                        if (id_kategori) params.append('id_kategori', id_kategori);
                        if (status) params.append('status', status);
                        if (page) params.append('page', page);

                        tableContainer.innerHTML = `
                            <div class="flex items-center justify-center py-12">
                                <div class="flex items-center gap-3 text-light-brown">
                                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-navy"></div>
                                    <span>Memuat halaman...</span>
                                </div>
                            </div>
                        `;

                        fetch(`/?${params.toString()}`, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
                                }
                            })
                            .then(response => response.text())
                            .then(updateTableContent)
                            .catch(error => {
                                console.error('Pagination error:', error);
                                tableContainer.innerHTML = `
                                <div class="text-center py-12 text-red-600">
                                    <i class="fa-solid fa-exclamation-triangle text-3xl mb-2"></i>
                                    <p>Terjadi kesalahan saat memuat halaman</p>
                                </div>
                            `;
                            });
                    });
                });
            }

            function updateTableContent(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                const newTable = doc.querySelector('.overflow-x-auto');
                if (newTable) {
                    tableContainer.innerHTML = newTable.innerHTML;
                }

                const newPagination = doc.querySelector('.flex.flex-wrap.gap-2');
                if (newPagination) {
                    paginationContainer.innerHTML = newPagination.innerHTML;
                } else {
                    paginationContainer.innerHTML = '';
                }

                const newTotal = doc.querySelector('p.font-semibold.text-navy');
                if (newTotal) {
                    totalText.textContent = newTotal.textContent;
                }

                attachPaginationListeners();
            }

            function performSearch() {
                const q = searchInput.value;
                const id_kategori = kategoriSelect.value;
                const status = statusSelect.value;

                tableContainer.innerHTML = `
                    <div class="flex items-center justify-center py-12">
                        <div class="flex items-center gap-3 text-light-brown">
                            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-navy"></div>
                            <span>Mencari pengaduan...</span>
                        </div>
                    </div>
                `;

                const params = new URLSearchParams();
                if (q) params.append('q', q);
                if (id_kategori) params.append('id_kategori', id_kategori);
                if (status) params.append('status', status);

                fetch(`/?${params.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
                        }
                    })
                    .then(response => response.text())
                    .then(updateTableContent)
                    .catch(error => {
                        console.error('Search error:', error);
                        tableContainer.innerHTML = `
                        <div class="text-center py-12 text-red-600">
                            <i class="fa-solid fa-exclamation-triangle text-3xl mb-2"></i>
                            <p>Terjadi kesalahan saat mencari data</p>
                        </div>
                    `;
                    });
            }

            function resetFilters() {
                searchInput.value = '';
                kategoriSelect.value = '';
                statusSelect.value = '';
                performSearch();
            }

            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 300);
            });

            kategoriSelect.addEventListener('change', performSearch);
            statusSelect.addEventListener('change', performSearch);
            filterButton.addEventListener('click', (event) => {
                event.preventDefault();
                performSearch();
            });
            resetButton.addEventListener('click', (event) => {
                event.preventDefault();
                resetFilters();
            });

            attachPaginationListeners();
        });
    </script>

</body>

</html>