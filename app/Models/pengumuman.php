<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengumuman extends Model
{
    use HasFactory;
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'deskripsi_singkat',
        'deskripsi'
    ];
}
