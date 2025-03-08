<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    protected $fillable = [
        'tanggal_pengeluaran',
        'nominal',
        'tujuan',
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
