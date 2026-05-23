<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'destinasi_id',
        'rating',
        'komentar',
    ];
}
