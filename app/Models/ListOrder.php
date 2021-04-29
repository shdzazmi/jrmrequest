<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'uid',
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'partno2',
        'lokasi1',
        'lokasi2',
        'lokasi3',
        'harga',
        'qty',
        'subtotal',
        'stok'
    ];
}
