<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('portofolios')->insert([
            'nama' => 'Dinda Nofitasari',
            'nim' => 'E41242053',
            'golongan' => 'E',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'tentang_saya' => 'Saya adalah mahasiswa semester 4 yang fokus pada pengembangan aplikasi web menggunakan Laravel dan mobile dengan Flutter.',
            'email' => 'sarinofitadinda@contoh.com',
            'instagram' => '@dindaa.ns21',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}