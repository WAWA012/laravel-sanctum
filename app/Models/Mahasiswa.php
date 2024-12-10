<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'nim_mahasiswa',      // NIM mahasiswa
        'nama_mahasiswa',     // Nama mahasiswa
        'jurusan_mahasiswa',    // Email mahasiswa
    ];
}
