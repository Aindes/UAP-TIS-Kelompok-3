<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matakuliahs')->insert([
            ['nama' => 'Pemrograman Dasar'],
            ['nama' => 'Pemrograman Lanjut'],
            ['nama' => 'Algoritma dan Struktur Data'],
            ['nama' => 'Sistem Basis Data'],
            ['nama' => 'Jaringan Komputer Dasar'],
        ]);
    }
}