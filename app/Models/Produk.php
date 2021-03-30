<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $fillable = [
        'nama',
        'kendaraan',
        'part_number'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    use HasFactory;


}
