<?php

namespace App\Repositories;

use App\Models\karyawan;
use App\Repositories\BaseRepository;

/**
 * Class karyawanRepository
 * @package App\Repositories
 * @version May 18, 2021, 1:43 pm WITA
*/

class karyawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_karyawan',
        'nama'
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
        return karyawan::class;
    }
}
