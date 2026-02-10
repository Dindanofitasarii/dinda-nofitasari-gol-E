<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        // Langsung membuat data di sini tanpa memanggil Model Portofolio
        $data = (object) [
            'nama' => 'Dinda Nofitasari',
            'nim' => 'E41242053',
            'golongan' => 'E',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'tentang_saya' => 'Saya adalah mahasiswa Jurusan Teknologi Informasi yang memiliki ketertarikan pada bidang pemrograman dan pengembangan web.',
            'email' => 'dinda@email.com',
            'instagram' => '@dindanofitasari'
        ];

        // Mengirim data langsung ke view 'portofolio.blade.php'
        return view('portofolio', compact('data'));
    }
}