<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $fillable =
    [
        'name',
        'gambar',
        'kode',
        'tanggal_pembelian',
        'harga_nilai',
        'akun_id',

    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    use HasFactory;
}
