<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Logbook
 * @package App\Models
 * @version May 19, 2021, 11:24 am WITA
 *
 * @property string $id_karyawan
 * @property string $waktu
 * @property string $status
 * @property string $keterangan
 */
class Logbook extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'logbooks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_karyawan',
        'waktu',
        'status',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_karyawan' => 'string',
        'nama' => 'string',
        'waktu' => 'string',
        'status' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_karyawan' => 'required',
        'waktu' => 'required',
        'status' => 'required'
    ];


}
