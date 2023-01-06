<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaKamar',
        'kapasitasMaximum',
        'urgensi',
        'kelas',
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}