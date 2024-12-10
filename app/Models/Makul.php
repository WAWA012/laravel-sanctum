<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'kode_mata_kuliah',      // NIM mahasiswa
        'nama_mata_kuliah',     // Nama mahasiswa
        'sks_mata_kuliah',    // Email mahasiswa
    ];
}
