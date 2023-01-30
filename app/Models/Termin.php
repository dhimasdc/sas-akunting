<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = 'termins';
    protected $fillable =
    [
        ('name'),
        ('value')
    ];
    use HasFactory;
}
