<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'dokter',
        'noRekMedis',
        'pembayaran',
        'durasi',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}