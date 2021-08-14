<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class requestbarang
 * @package App\Models
 * @version March 29, 2021, 12:22 am UTC
 *
 * @property string $tanggal
 * @property string $nama
 * @property string $barcode
 * @property string $kd_supplier
 * @property string $kendaraan
 * @property string $partno1
 * @property string $keterangan
 * @property string $user
 */
class requestbarang extends Model
{
    use HasFactory;

    public $table = 'requestbarangs';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'tanggal',
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'keterangan',
        'user',
        'status',
        'approve_request',
        'requested_at',
        'approve_purchase',
        'approved_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'datetime:d-m-Y H:i:s',
        'nama' => 'string',
        'barcode' => 'string',
        'kd_supplier' => 'string',
        'kendaraan' => 'string',
        'partno1' => 'string',
        'keterangan' => 'string',
        'user' => 'string',
        'status' => 'string',
        'approve_request' => 'string',
        'approve_purchase' => 'string',
        'requested_at' => 'string',
        'approved_at' => 'string'

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
