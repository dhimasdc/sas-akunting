<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Pesanan extends Model
{
    protected $table = 'pembelian__pesanans';
    protected $fillable =
    [
        ('kode'),
        ('kontak_id'),
        ('sales_id'),
        ('referensi'),
        ('tanggal_transaksi'),
        ('tanggal_jatuh_tempo'),
        ('status'),
        ('sisa_tagihan'),
        ('sub_total'),
        ('diskon'),
        ('uang_muka'),
        ('pengiriman_id'),
        ('pajak'),
        ('pajak_id'),
        ('total'),
        ('termin'),
        ('gudang_id'),
        ('produk_id'),
        ('attachment'),
        ('pesan'),

    ];

    public function kontak()
    {
        return $this->belongsTo(Kontak::class);
    }

    public function sales()
    {
        return $this->hasOne(Karyawan::class);
    }

    public function pajak()
    {
        return $this->hasOne(Pajak::class);
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class);
    }

    public function gudang()
    {
        return $this->hasOne(Gudang::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    use HasFactory;
}
