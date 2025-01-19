<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamus'; // Nama tabel di database

    protected $primaryKey = 'id_tamu'; // Primary key

    protected $fillable = [
        'nama_tamu',
        'email_tamu',
        'nomor_telepon',
    ];

    // Relasi dengan model Kehadiran
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'id_tamu');
    }
}
