<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga'; // Tentukan nama tabel secara eksplisit
    
    protected $fillable = [
        'no_kk', 
        'nama_kepala_keluarga', 
        'nik', 
        'alamat'
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
