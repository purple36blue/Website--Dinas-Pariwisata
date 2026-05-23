<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasis';

    protected $fillable = [
        'nama',
        'lokasi',
        'kategori',
        'harga',
        'jenis',
        'koordinat',
        'jam_operasional',
        'fasilitas',
        'deskripsi_singkat',
        'deskripsi',
        'foto'
    ];

    public function ratings()
    {
        return $this->hasMany(rating::class, 'destinasi_id');
    }
}

