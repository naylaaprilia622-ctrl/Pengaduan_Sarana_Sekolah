<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = ['Kebersihan', 'Keamanan', 'Fasilitas', 'Sanitasi', 'Lainnya'];

        foreach ($kategoris as $ket) {
            DB::table('kategoris')->insert(['ket_kategori' => $ket]);
        }
    }
}
