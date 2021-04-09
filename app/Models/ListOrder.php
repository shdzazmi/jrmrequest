<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
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
        'qty'
    ];
}
