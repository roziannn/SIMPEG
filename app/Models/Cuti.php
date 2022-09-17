<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'unitkerja_nama',
        'jenis_cuti',
        'tgl_mulai',
        'tgl_selesai',
        'lama_terbilang',
        'uraian',
        'tgl_pengajuan',
        'status'
    ];
}
