<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';
    protected $fillable =
    [
        ('name'),

    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function item_penjualan_penawaran()
    {
        return $this->hasMany(ItemPenjualanPenawaran::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
    use HasFactory;
}
