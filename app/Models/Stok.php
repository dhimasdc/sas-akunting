<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stoks';
    protected $fillable =
    [
        ('tipe'),
        ('kode'),
        ('akun_id'),
        ('tanggal'),
        ('qty_tercatat'),
        ('qty_aktual'),
        ('qty_selisih'),
        ('satuan_id'),
        ('harga_rata'),
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    use HasFactory;
}
