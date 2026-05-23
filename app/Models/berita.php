<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi_singkat',
        'deskripsi'
    ];
}
