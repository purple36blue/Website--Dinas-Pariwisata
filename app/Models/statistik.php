<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class statistik extends Model
{
    protected $table = 'statistik';
    protected $fillable = [
        'tahun',
        'wisatawan_domestik',
        'wisatawan_mancanegara'
    ];
}
