<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'suratkeluar';
    protected $fillable = [
        'no_surat',
        'perihal',
        'tgl_surat',
        'instansi',
        'periode'
    ];
}
