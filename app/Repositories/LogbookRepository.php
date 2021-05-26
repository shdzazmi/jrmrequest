<?php

namespace App\Repositories;

use App\Models\Logbook;
use App\Repositories\BaseRepository;

/**
 * Class LogbookRepository
 * @package App\Repositories
 * @version May 19, 2021, 11:24 am WITA
*/

class LogbookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_karyawan',
        'waktu',
        'status',
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
        return Logbook::class;
    }
}
