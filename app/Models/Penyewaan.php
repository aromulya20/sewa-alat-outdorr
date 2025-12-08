<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaans';

    protected $fillable = [
        'nama_penyewa',
        'nama_barang',
        'jumlah',
        'tanggal_sewa',
        'tanggal_kembali',
        'harga',
        'status'
    ];
}
