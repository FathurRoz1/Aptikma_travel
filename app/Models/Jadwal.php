<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'm_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'asal', 'tujuan', 'titik_kumpul', 'jam', 'harga', 'modal', 'laba', 'id_vendor'
    ];
}
