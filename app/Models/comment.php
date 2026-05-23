<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'role'
    ];
}
