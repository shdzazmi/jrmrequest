<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SalesOrder
 * @package App\Models
 * @version April 1, 2021, 4:32 pm WITA
 *
 * @property string $uid
 * @property string $nama
 * @property string $no_telepon
 * @property string $tanggal
 * @property string $status
 */
class SalesOrder extends Model
{
    use HasFactory;

    public $table = 'sales_orders';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'uid',
        'nama',
        'tanggal',
        'status',
        'tipeharga',
        'operator'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'uid' => 'string',
        'nama' => 'string',
        'tanggal' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'nama' => 'required',
    ];


}
