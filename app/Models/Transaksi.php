<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable =
    [
        ('kode'),
        ('akun_id'),
        ('tanggal_transaksi'),
        ('attachment'),
        ('referensi'),
        ('total_dibayar'),

    ];

    public function akun()
    {
        return $this->hasOne(Akun::class);
    }
    use HasFactory;
}
