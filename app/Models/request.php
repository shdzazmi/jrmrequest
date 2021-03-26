<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class request
 * @package App\Models
 * @version March 26, 2021, 8:38 am UTC
 *
 * @property string $tanggal
 * @property string $nama_produk
 * @property string $keterangan
 */
class request extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'requests';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'nama_produk',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'string',
        'nama_produk' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'nama_produk' => 'required'
    ];

    
}
