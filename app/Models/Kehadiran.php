<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadirans'; // Nama tabel di database

    protected $primaryKey = 'id_kehadiran'; // Primary key

    protected $fillable = [
        'id_tamu',
        'acara',
        'waktu_kehadiran',
        'status_kehadiran',
    ];

    // Relasi dengan model Tamu
    public function tamu()
    {
        return $this->belongsTo(Tamu::class, 'id_tamu');
    }
}
