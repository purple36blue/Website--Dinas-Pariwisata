<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'foto'
    ];
}
