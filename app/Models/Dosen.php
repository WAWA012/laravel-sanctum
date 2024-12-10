<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'nidn_dosen',      // NIM mahasiswa
        'nama_dosen',     // Nama mahasiswa
        'matakuliah_dosen',    // Email mahasiswa
    ];
}
