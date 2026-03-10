<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    // Nama tabel
    protected $table = 'outlets';

    // Kolom yang boleh diisi secara massal
    protected $fillable = ['code', 'name', 'address', 'phone', 'status'];
}