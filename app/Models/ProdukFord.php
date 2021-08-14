<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukFord extends Model
{
    use HasFactory;
    public $table = 'produk_ford';

    protected $fillable = [
        'nama',
        'kendaraan',
        'partno1',
        'partno2',
        'harga',
        'merek'
        ];
}
