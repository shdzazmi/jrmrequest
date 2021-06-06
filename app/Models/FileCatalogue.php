<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FileCatalogue
 * @package App\Models
 * @version May 28, 2021, 8:28 am WITA
 *
 * @property string $Nama
 * @property string $file_path
 */
class FileCatalogue extends Model
{
    use HasFactory;

    public $table = 'file_catalogues';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nama',
        'kategori',
        'file_path',
        'cover_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nama' => 'string',
        'kategori' => 'string',
        'file_path' => 'string',
        'cover_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nama' => 'required'
    ];


}
