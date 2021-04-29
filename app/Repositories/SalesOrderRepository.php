<?php

namespace App\Repositories;

use App\Models\SalesOrder;

/**
 * Class SalesOrderRepository
 * @package App\Repositories
 * @version April 1, 2021, 4:32 pm WITA
*/

class SalesOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'uid',
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'partno2',
        'lokasi1',
        'lokasi2',
        'lokasi3',
        'harga',
        'qty',
        'subtotal'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SalesOrder::class;
    }
}
