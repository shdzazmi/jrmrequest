<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class requestbarang
 * @package App\Models
 * @version March 29, 2021, 12:22 am UTC
 *
 * @property string $tanggal
 * @property string $nama
 * @property string $kendaraan
 * @property string $part_number
 * @property string $keterangan
 */
class requestbarang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'requestbarangs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'nama',
        'kendaraan',
        'part_number',
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
        'nama' => 'string',
        'kendaraan' => 'string',
        'part_number' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'nama' => 'required'
    ];

    
}
