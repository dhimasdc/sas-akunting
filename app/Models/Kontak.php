<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontaks';
    protected $fillable =
    [
        ('tipe'),
        ('name'),
        ('biaya_id'),
        ('perusahaan'),
        ('alamat'),
        ('email'),
        ('telepon'),

    ];

    public function biaya()
    {
        return $this->hasOne(Biaya::class);
    }

    public function pembelian_penawaran()
    {
        return $this->hasMany(Pembelian_Penawaran::class);
    }

    public function pembelian_pesanan()
    {
        return $this->hasMany(Pembelian_Pesanan::class);
    }

    public function pembelian_tagihan()
    {
        return $this->hasMany(Pembelian_Tagihan::class);
    }

    public function penjualan_penawaran()
    {
        return $this->hasMany(Penjualan_Penawaran::class);
    }

    public function penjualan_pesanan()
    {
        return $this->hasMany(Penjualan_Pesanan::class);
    }

    public function penjualan_tagihan()
    {
        return $this->hasMany(Penjualan_Tagihan::class);
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
    use HasFactory;
}
