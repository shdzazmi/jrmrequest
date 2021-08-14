<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukBlpk extends Model
{
    use HasFactory;
    public $table = 'produk_blpk';

    protected $fillable = [
        'nama',
        'ketnama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'partno2',
        'lokasi1',
        'lokasi2',
        'lokasi3',
        'harga',
        'harga2',
        'harga3',
        'hargamin',
        'qty',
        'qtyTk',
        'qtyGd',
        'satuan',
        'merek',
        'status',
    ];


}
