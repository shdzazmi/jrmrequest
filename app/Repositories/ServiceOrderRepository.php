<?php

namespace App\Repositories;

use App\Models\ServiceOrder;
use App\Repositories\BaseRepository;

/**
 * Class ServiceOrderRepository
 * @package App\Repositories
 * @version June 1, 2021, 1:08 pm WITA
*/

class ServiceOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'uid',
        'nama',
        'tanggal',
        'operator'
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
        return ServiceOrder::class;
    }
}
