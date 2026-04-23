<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspirasiSeeder extends Seeder
{
    public function run(): void
    {
        // Data dummy aspirasi: [nis, id_kategori, status, feedback, lokasi, ket, tanggal]
        $data = [
            [
                'nis'         => 1001,
                'id_kategori' => 3, // Fasilitas
                'status'      => 'Selesai',
                'feedback'    => 'Kursi sudah diganti dengan yang baru. Terima kasih atas laporannya.',
                'lokasi'      => 'Ruang Kelas XII RPL 1',
                'ket'         => 'Kursi di baris ketiga sudah rusak dan berbahaya untuk digunakan.',
                'tanggal'     => '2026-03-10 08:30:00',
            ],
            [
                'nis'         => 1002,
                'id_kategori' => 1, // Kebersihan
                'status'      => 'Selesai',
                'feedback'    => 'Petugas kebersihan sudah membersihkan area tersebut secara rutin.',
                'lokasi'      => 'Kantin Sekolah',
                'ket'         => 'Area kantin kotor dan banyak sampah yang tidak dibersihkan setelah jam makan.',
                'tanggal'     => '2026-03-12 09:00:00',
            ],
            [
                'nis'         => 1003,
                'id_kategori' => 4, // Sanitasi
                'status'      => 'Proses',
                'feedback'    => 'Tim teknisi sedang memperbaiki instalasi air di toilet tersebut.',
                'lokasi'      => 'Toilet Siswa Lantai 1',
                'ket'         => 'Kran air di toilet tidak berfungsi sudah lebih dari seminggu.',
                'tanggal'     => '2026-03-18 10:15:00',
            ],
            [
                'nis'         => 1001,
                'id_kategori' => 3, // Fasilitas
                'status'      => 'Proses',
                'feedback'    => 'Teknisi dijadwalkan memperbaiki proyektor pada minggu ini.',
                'lokasi'      => 'Lab Komputer',
                'ket'         => 'Proyektor di lab komputer mati dan tidak dapat digunakan untuk pembelajaran.',
                'tanggal'     => '2026-03-20 07:45:00',
            ],
            [
                'nis'         => 1004,
                'id_kategori' => 2, // Keamanan
                'status'      => 'Menunggu',
                'feedback'    => null,
                'lokasi'      => 'Parkir Sepeda',
                'ket'         => 'Lampu area parkir sepeda mati sehingga gelap dan rawan di malam hari.',
                'tanggal'     => '2026-04-01 11:00:00',
            ],
            [
                'nis'         => 1005,
                'id_kategori' => 1, // Kebersihan
                'status'      => 'Menunggu',
                'feedback'    => null,
                'lokasi'      => 'Koridor Lantai 2',
                'ket'         => 'Atap bocor saat hujan dan mengakibatkan lantai licin di koridor lantai 2.',
                'tanggal'     => '2026-04-05 08:00:00',
            ],
            [
                'nis'         => 1002,
                'id_kategori' => 5, // Lainnya
                'status'      => 'Menunggu',
                'feedback'    => null,
                'lokasi'      => 'Perpustakaan',
                'ket'         => 'AC perpustakaan tidak dingin, suhu ruangan sangat panas sehingga tidak nyaman.',
                'tanggal'     => '2026-04-08 13:00:00',
            ],
            [
                'nis'         => 1003,
                'id_kategori' => 2, // Keamanan
                'status'      => 'Menunggu',
                'feedback'    => null,
                'lokasi'      => 'Pintu Gerbang Belakang',
                'ket'         => 'Kunci pintu gerbang belakang rusak dan tidak bisa dikunci dengan benar.',
                'tanggal'     => '2026-04-10 14:30:00',
            ],
            [
                'nis'         => 1004,
                'id_kategori' => 4, // Sanitasi
                'status'      => 'Proses',
                'feedback'    => 'Sudah dilaporkan ke pihak sarana prasarana, sedang menunggu bahan.',
                'lokasi'      => 'Toilet Guru Lantai 2',
                'ket'         => 'Closet di toilet guru lantai 2 tersumbat dan tidak bisa digunakan.',
                'tanggal'     => '2026-04-11 09:30:00',
            ],
            [
                'nis'         => 1005,
                'id_kategori' => 3, // Fasilitas
                'status'      => 'Selesai',
                'feedback'    => 'Papan tulis sudah diganti dengan yang baru. Terima kasih.',
                'lokasi'      => 'Ruang Kelas X RPL 1',
                'ket'         => 'Papan tulis sudah pudar dan tulisan tidak terlihat jelas dari bangku belakang.',
                'tanggal'     => '2026-04-12 10:00:00',
            ],
        ];

        foreach ($data as $item) {
            $diproses_at     = in_array($item['status'], ['Proses', 'Selesai']) ? date('Y-m-d H:i:s', strtotime($item['tanggal'] . ' +1 day')) : null;
            $diselesaikan_at = $item['status'] === 'Selesai' ? date('Y-m-d H:i:s', strtotime($item['tanggal'] . ' +3 day')) : null;

            // Insert ke tabel aspirasis
            $aspirasi = DB::table('aspirasis')->insertGetId([
                'nis'             => $item['nis'],
                'id_kategori'     => $item['id_kategori'],
                'status'          => $item['status'],
                'feedback'        => $item['feedback'],
                'diproses_at'     => $diproses_at,
                'diselesaikan_at' => $diselesaikan_at,
                'created_at'      => $item['tanggal'],
                'updated_at'      => $item['tanggal'],
            ]);

            // Insert ke tabel input_aspirasis
            DB::table('input_aspirasis')->insert([
                'id_aspirasi' => $aspirasi,
                'nis'         => $item['nis'],
                'id_kategori' => $item['id_kategori'],
                'lokasi'      => $item['lokasi'],
                'ket'         => $item['ket'],
                'created_at'  => $item['tanggal'],
                'updated_at'  => $item['tanggal'],
            ]);
        }
    }
}
