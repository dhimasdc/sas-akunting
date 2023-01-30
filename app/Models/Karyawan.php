<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawans';
    protected $fillable =
    [
        ('tipe'),
        ('name'),
        ('biaya_id'),
        ('alamat'),
        ('email'),
        ('telepon'),

    ];

    public function biaya()
    {
        return $this->hasOne(Biaya::class);
    }

    public function penjualan_pesanan()
    {
        return $this->belongsTo(Penjualan_Pesanan::class);
    }

    public function penjualan_tagihan()
    {
        return $this->belongsTo(Penjualan_Tagihan::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
    use HasFactory;
}
