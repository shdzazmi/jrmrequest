<?php

namespace App\Repositories;

use App\Models\ListServiceOrder;
use App\Repositories\BaseRepository;

/**
 * Class ListServiceOrderRepository
 * @package App\Repositories
 * @version June 2, 2021, 8:46 am WITA
*/

class ListServiceOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nourut',
        'uid',
        'barcode',
        'harga',
        'qty',
        'subtotal',
        'discount'
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
        return ListServiceOrder::class;
    }
}
