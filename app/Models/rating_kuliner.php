<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating_kuliner extends Model
{
    use HasFactory;
    protected $table = 'rating_kuliners';
    protected $fillable = [
        'kuliner_id',
        'rating',
        'komentar',
    ];

}
