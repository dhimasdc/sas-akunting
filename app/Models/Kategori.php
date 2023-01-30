<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable =
    [

        ('name'),

    ];
    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    use HasFactory;
}
