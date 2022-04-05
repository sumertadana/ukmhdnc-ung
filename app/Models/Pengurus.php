<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $fillable = [
        'nama',
        'nim',
        'id_bidang',
        'id_jabatan',
        'periode',
        'foto',
    ];
}
