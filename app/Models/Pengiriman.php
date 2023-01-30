<?php

namespace App\Models;

use App\Http\Livewire\User\Penjualan\PenjualanPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimen';
    protected $fillable =
    [
        ('kode'),
        ('jenis'),
        ('kontak_id'),
        ('referensi'),
        ('tanggal_pengiriman'),
        ('biaya_pengiriman'),
        ('status'),
        ('ekspedisi'),
        ('nomor_resi'),
        ('pemesanan_id'),

    ];
    public function kontak()
    {
        return $this->belongsTo(Kontak::class);
    }
    public function pemesanan()
    {
        return $this->belongsTo('App\Models\Penjualan_Pesanan', 'pemesanan_id', 'id');
    }
    public function pemesanan_pembelian()
    {
        return $this->belongsTo('App\Models\Pembelian_Pesanan', 'pembelian_pemesanan_id', 'id');
    }
    public function gudang()
    {
        return $this->belongsTo('App\Models\Gudang', 'gudang_id', 'id');
    }
    use HasFactory;
}
