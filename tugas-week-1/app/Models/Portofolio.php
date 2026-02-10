<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

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