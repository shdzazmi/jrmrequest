<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrderAffari extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nourut',
        'uid',
        'barcode',
        'harga',
        'qty',
        'subtotal',
    ];
}
