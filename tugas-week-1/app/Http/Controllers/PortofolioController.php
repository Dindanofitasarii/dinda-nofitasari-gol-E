<?php

namespace App\Http\Controllers;

use App\Models\Portofolio; // Ini kunci untuk menyambungkan ke DB
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        // Perintah ini akan mengambil data pertama yang ada di tabel portofolios
        $data = Portofolio::first(); 

        // Mengirim variabel $data ke view 'portofolio.blade.php'
        return view('portofolio', compact('data'));
    }
}