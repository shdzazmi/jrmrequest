<?php

namespace App\Repositories;

use App\Models\request;
use App\Repositories\BaseRepository;

/**
 * Class requestRepository
 * @package App\Repositories
 * @version March 26, 2021, 8:38 am UTC
*/

class requestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'nama_produk',
        'keterangan'
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
        return request::class;
    }
}
