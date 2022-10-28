<?php

namespace App\Models;

use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [
        'no_surat',
        'perihal',
        'tgl_surat',
        'instansi',
        'periode',
        'file_surat'
    ];

    public function getTglSuratAttribute()
    {
        return Carbon::parse($this->attributes['tgl_surat'])
            ->translatedFormat('d F Y');
    }
}
