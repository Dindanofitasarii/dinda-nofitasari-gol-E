<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    // Nama tabel di database (Opsional jika namanya sudah jamak/plural)
    protected $table = 'portofolios';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'nama',
        'nim',
        'golongan',
        'jurusan',
        'program_studi',
        'tentang_saya',
        'email',
        'instagram',
    ];
}