<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = [
        'nama',
        'nim',
        'alamat',
        'jk',
        'jurusan',
        'angkatan',
        'status',
        'email',
    ];
}
