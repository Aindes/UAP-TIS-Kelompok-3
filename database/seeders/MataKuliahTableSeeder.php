<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MatakuliahTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matakuliahs')->insert([
            [
                'nama' => 'Pemrograman Dasar',
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()  
            ],
            [
                'nama' => 'Pemrograman Lanjut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Algoritma dan Struktur Data',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Sistem Basis Data',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Jaringan Komputer Dasar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}

