<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar2 extends Model
{
    use HasFactory;
    protected $table = 'komentar2';
    protected $fillable = [
        'id_komentar',
        'nama',
        'komentar'
    ];
}
