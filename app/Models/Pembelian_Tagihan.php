<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Tagihan extends Model
{
    protected $table = 'pembelian__tagihans';
    protected $fillable =
    [
        ('kode'),
        ('kontak_id'),
        ('referensi'),
        ('tanggal_transaksi'),
        ('transaksi_id'),
        ('tanggal_jatuh_tempo'),
        ('status'),
        ('sisa_tagihan'),
        ('sub_total'),
        ('diskon'),
        ('uang_muka'),
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

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function sales()
    {
        return $this->hasOne(Karyawan::class);
    }

    public function pajak()
    {
        return $this->hasOne(Pajak::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    use HasFactory;
}
