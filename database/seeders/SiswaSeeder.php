<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['nis' => 1001, 'nama' => 'Budi Santoso',    'kelas' => 'XII RPL 1', 'password' => Hash::make('siswa123')],
            ['nis' => 1002, 'nama' => 'Siti Rahayu',     'kelas' => 'XII RPL 2', 'password' => Hash::make('siswa123')],
            ['nis' => 1003, 'nama' => 'Ahmad Fauzi',     'kelas' => 'XI RPL 1',  'password' => Hash::make('siswa123')],
            ['nis' => 1004, 'nama' => 'Dewi Lestari',    'kelas' => 'XI RPL 2',  'password' => Hash::make('siswa123')],
            ['nis' => 1005, 'nama' => 'Rizky Pratama',   'kelas' => 'X RPL 1',   'password' => Hash::make('siswa123')],
        ];

        foreach ($siswas as $siswa) {
            DB::table('siswas')->insert(array_merge($siswa, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
