<?php

namespace App\Repositories;

use App\Models\requestbarang;

/**
 * Class requestbarangRepository
 * @package App\Repositories
 * @version March 29, 2021, 12:22 am UTC
*/

class requestbarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'nama',
        'barcode',
        'kd_supplier',
        'kendaraan',
        'partno1',
        'keterangan',
        'user'
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
        return requestbarang::class;
    }
}
