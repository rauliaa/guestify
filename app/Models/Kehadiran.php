<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected $casts = [
        'waktu_kehadiran' => 'datetime:Y-m-d H:i:s',
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class, 'id_tamu');
    }

    public function getWaktuKehadiranAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');
    }
}
