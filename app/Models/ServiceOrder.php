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
class ServiceOrder extends Model
{
    use HasFactory;

    public $table = 'service_orders';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'uid',
        'nourut',
        'no_penawaran',
        'nama',
        'mobil',
        'nopol',
        'status',
        'tanggal',
        'outlet',
        'ppn',
        'tanpabongkar',
        'operator',
        'approve_service',
        'approve_produk',
        'times_updated',
        'updated_by',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uid' => 'string',
        'nourut' => 'integer',
        'no_penawaran' => 'string',
        'nama' => 'string',
        'mobil' => 'string',
        'nopol' => 'string',
        'status' => 'string',
        'tanggal' => 'string',
        'outlet' => 'string',
        'operator' => 'string',
        'ppn' => 'boolean',
        'tanpabongkar' => 'boolean',
        'approve_service' => 'string',
        'approve_produk' => 'string',
        'times_updated' => 'integer',
        'times_printed' => 'integer',
        'updated_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
