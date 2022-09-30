<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;

    protected $fillable = [
        //linked with pegawai table with 'nip'
        'nip',
        'vaksin1',
        'vaksin2',
        'vaksin3',
        'tglVaksin1',
        'tglVaksin2',
        'tglVaksin3',
    ];
}
