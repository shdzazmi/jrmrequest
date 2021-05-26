<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class karyawan
 * @package App\Models
 * @version May 18, 2021, 1:43 pm WITA
 *
 * @property string $id_karyawan
 * @property string $nama
 */
class karyawan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'karyawans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_karyawan',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_karyawan' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_karyawan' => 'required',
        'nama' => 'required'
    ];

    
}
