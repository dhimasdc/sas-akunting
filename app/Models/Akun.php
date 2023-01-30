<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';
    protected $fillable =
    [
        ('name'),
        ('kode'),
        ('kategori'),
        ('sub_akun'),
        ('saldo'),

    ];

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class);
    }

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }

    use HasFactory;
}
