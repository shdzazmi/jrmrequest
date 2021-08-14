<?php

namespace App\Repositories;

use App\Models\ListOrder;

/**
 * Class ListOrderRepository
 * @package App\Repositories
 * @version March 29, 2021, 12:22 am UTC
*/

class ListOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'lokasi',
        'harga',
        'keterangan',
        'qty'
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
        return ListOrder::class;
    }
}
