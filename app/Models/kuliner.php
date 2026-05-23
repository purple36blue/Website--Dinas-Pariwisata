<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kuliner extends Model
{
    use HasFactory;
    protected $table = 'kuliners';

    protected $fillable = [
        'nama',
        'bahan_utama',
        'jenis',
        'video',
        'deskripsi',
        'foto'
    ];
}
