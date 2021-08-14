<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukIsuzu extends Model
{
    use HasFactory;
    public $table = 'produk_isuzu';

    protected $fillable = [
        'nama',
        'kendaraan',
        'partno1',
        'partno2',
        'harga',
        'merek'
        ];
}
