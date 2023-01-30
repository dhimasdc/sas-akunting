<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $table = 'pajaks';
    protected $fillable =
    [
        ('name'),
        ('value'),

    ];

    public function pembelian_penawaran()
    {
        return $this->belongsTo(Pembelian_Penawaran::class);
    }

    public function pembelian_pesanan()
    {
        return $this->belongsTo(Pembelian_Pesanan::class);
    }

    public function pembelian_tagihan()
    {
        return $this->belongsTo(Pembelian_Tagihan::class);
    }

    public function penjualan_penawaran()
    {
        return $this->belongsTo(Penjualan_Penawaran::class);
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
