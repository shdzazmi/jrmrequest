<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'part_number',
        'lokasi',
        'harga',
    ];
    use HasFactory;


}
