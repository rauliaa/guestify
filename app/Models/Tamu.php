<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamus'; // Nama tabel yang benar

    protected $primaryKey = 'id_tamu'; // Set primary key sebagai 'id_tamu'

    public $incrementing = true; // Mengingat id_tamu adalah auto-increment
    protected $keyType = 'int'; // Primary key adalah integer

    protected $fillable = [
        'nama_tamu',
        'email_tamu',
        'nomor_telepon',
        'kode_unik',
    ];

    // Relasi dengan model Kehadiran
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'id_tamu');
    }
}
