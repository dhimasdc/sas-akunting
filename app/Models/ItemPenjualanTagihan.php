<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPenjualanTagihan extends Model
{
    protected $table = 'item_penjualan_tagihans';
    protected $fillable =
    [
        ('produk_id'),
        ('penjualan_id'),
        ('deskripsi'),
        ('qty'),
        ('discount'),
        ('harga'),
        ('pajak_id'),
        ('satuan_id'),
        ('jumlah'),
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    use HasFactory;
}
