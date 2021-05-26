<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Logbook_barang
 * @package App\Models
 * @version May 21, 2021, 9:57 am WITA
 *
 * @property string $tanggal
 * @property string $nama
 * @property string $driver
 * @property string $plat
 * @property string $tujuan
 * @property string $barcode
 */
class Logbook_barang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'logbook_barangs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'nama',
        'driver',
        'plat',
        'tujuan',
        'barcode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'string',
        'nama' => 'string',
        'driver' => 'string',
        'plat' => 'string',
        'tujuan' => 'string',
        'barcode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'driver' => 'required',
        'plat' => 'required',
        'tujuan' => 'required',
        'barcode' => 'required'
    ];

    
}
