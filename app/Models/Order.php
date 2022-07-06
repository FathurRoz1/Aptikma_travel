<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 't_order';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'tanggal', 'id_jadwal', 'asal', 'tujuan', 'asal_detail', 'tujuan_detail', 'harga', 'modal', 'laba', 'jumlah_penumpang', 'total_harga', 'total_modal', 'total_laba', 'id_vendor', 'nama_pelanggan', 'no_hp_pelanggan', 'email', 'alamat', 
    ];

    public static function order($order)
    {
        return self::find($order);
    }
}
