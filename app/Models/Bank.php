<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'm_bank';
    protected $primaryKey = 'id_bank';
    protected $fillable = [
        'nama_bank', 'no_rekening', 'atas_nama', 'logo', 'created_by',  
    ];
}
