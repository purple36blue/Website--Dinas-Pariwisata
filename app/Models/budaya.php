<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class budaya extends Model
{
    use HasFactory;
    protected $table = 'budayas';

    protected $fillable = [
        'nama',
        'jenis',
        'video',
        'deskripsi',
        'foto'
    ];
}
