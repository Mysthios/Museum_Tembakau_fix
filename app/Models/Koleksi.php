<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = 'koleksis';

    protected $primaryKey = 'koleksi_id';

    protected $fillable = [
        'judul',
        'deskripsi_singkat',
        'deskripsi',
        'gambar',
    ];

    /**
     * Relasi ke tabel Admin.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}
