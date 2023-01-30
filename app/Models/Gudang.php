<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'gudangs';
    protected $fillable =
    [
        'nama',
        'kode',
        'total_jumlah',
        'total_nilai',
        'stok_id',

    ];

    public function stok()
    {
        return $this->hasOne(Stok::class);
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

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    use HasFactory;
}
