<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'm_kota';
    protected $primaryKey = 'id_kota';
    protected $fillable = [
        'nama_kota', 'created_by', 'date_add', 'deleted',  
    ];

    public static function kota($kota)
    {
        return self::find($kota);
    }
}
