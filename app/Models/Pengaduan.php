<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        //linked with pegawai table with 'nama'
        'token',
        'nama',
        'kategori_pengaduan',
        'judul',
        'keterangan',
        'tanggal',
        'status',
    ];
}
