<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'unitkerja_nama',
        'jabatan',
        'status_pegawai',
        'no_telp',
        'agama',
        'gender',
        'alamat'
    ];
}
