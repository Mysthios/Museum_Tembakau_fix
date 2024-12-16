<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tikets';

    protected $fillable = [
        'tipe_tiket',
        'harga',
        'nama_pembeli',
        'phone_number',
        'tanggal_pembelian',
        'tanggal_kunjungan',
        'email',
    ];
}
