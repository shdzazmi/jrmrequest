<?php

namespace App\Repositories;

use App\Models\SalesOrder;
use App\Repositories\BaseRepository;

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
        'uid',
        'nama',
        'no_telepon',
        'tanggal',
        'status'
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
