<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prodis')->insert([
            ['nama' => 'Teknologi Informasi'],
            ['nama' => 'Sistem Informasi'],
            ['nama' => 'Pendidikan Teknologi Informasi'],
            ['nama' => 'Teknik Informatika'],
            ['nama' => 'Teknik Komputer'],
        ]);
    }
}