<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable =
    [
        ('name'),
        ('jenis'),
        ('sku'),
        ('gambar'),
        ('kode'),
        ('akun_inventory_id'),
        ('gudang_id'),
        ('satuan_id'),
        ('deskripsi'),
        ('tanggal_transaksi'),
        ('attachment'),
        ('harga_beli'),
        ('harga_jual'),
        ('grosir_minimal'),
        ('grosir_tipe'),
        ('grosir_harga'),
        ('stok_min'),
        ('manufaktur_produk'),
        ('manufaktur_kuantitas'),
        ('manufaktur_harga'),
        ('akun_manufaktur_id'),
        ('stok_id'),
        ('produksi_biaya'),
        ('total_dibayar'),

    ];

    public function akun()
    {
        return $this->hasMany(akun::class);
    }

    public function item_penjualan_penawaran()
    {
        return $this->hasMany(ItemPenjualanPenawaran::class);
    }

    public function gudang()
    {
        return $this->hasOne(gudang::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }

    use HasFactory;
}
