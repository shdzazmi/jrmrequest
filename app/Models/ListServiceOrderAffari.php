<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ListServiceOrder
 * @package App\Models
 * @version June 2, 2021, 8:46 am WITA
 *
 * @property integer $nourut
 * @property string $uid
 * @property string $barcode
 * @property string $harga
 * @property integer $qty
 * @property integer $subtotal
 * @property integer $discount
 */
class ListServiceOrderAffari extends Model
{
    use HasFactory;

    public $table = 'list_service_order_affaris';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nourut',
        'uid',
        'type',
        'barcode',
        'ketnama',
        'harga',
        'qty',
        'subtotal',
        'discount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nourut' => 'integer',
        'uid' => 'string',
        'type' => 'string',
        'barcode' => 'string',
        'ketnama' => 'string',
        'harga' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer',
        'discount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
