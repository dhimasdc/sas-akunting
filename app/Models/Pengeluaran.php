<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluarans';
    protected $fillable =
    [
        ('biaya_id'),
        ('transaksi_id'),
        ('kontak_id'),
        ('referensi'),
        ('tanggal_transaksi'),
        ('tanggal_jatuh_tempo'),
        ('status'),
        ('sisa_tagihan'),
        ('sub_total'),
        ('pajak'),
        ('pajak_id'),
        ('total'),
        ('termin'),
        ('akun_id'),
        ('attachment'),
        ('pesan'),

    ];

    public function biaya()
    {
        return $this->hasOne(Biaya::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function pajak()
    {
        return $this->hasOne(Pajak::class);
    }

    public function akun()
    {
        return $this->hasOne(Akun::class);
    }

    use HasFactory;
}
