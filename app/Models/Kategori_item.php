<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_item extends Model
{
    use HasFactory;
    protected $table = 'kategori_item';
    protected $primaryKey = 'id_kategori';    
}
