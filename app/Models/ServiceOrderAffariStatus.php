<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ServiceOrder
 * @package App\Models
 * @version June 1, 2021, 1:08 pm WITA
 *
 * @property string $uid
 * @property string $nama
 * @property string $mobil
 * @property string $tanggal
 * @property string $operator
 */
class ServiceOrderAffariStatus extends Model
{
    use HasFactory;

    public $table = 'service_order_affaris_status';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'no_penawaran',
        'status',
        'approve_service',
        'approve_produk',
        'ppn',
        'tanpabongkar',
        'times_printed',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_penawaran' => 'string',
        'status' => 'string',
        'approve_service' => 'string',
        'approve_produk' => 'string',
        'ppn'=> 'integer',
        'tanpabongkar'=> 'integer',
        'times_printed'=> 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
