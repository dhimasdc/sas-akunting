<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biayas';
    protected $fillable =
    [
        'kode',
        'piutang',
        'hutang',
        'tanggal_transaksi',
        'tanggal_jatuh_tempo',
        'tanggal_pelunasan'

    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function kontak()
    {
        return $this->belongsTo(Kontak::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
    use HasFactory;
}
