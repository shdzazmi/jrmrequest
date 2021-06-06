<?php

namespace App\Repositories;

use App\Models\Logbook_barang;
use App\Repositories\BaseRepository;

/**
 * Class Logbook_barangRepository
 * @package App\Repositories
 * @version May 21, 2021, 9:57 am WITA
*/

class Logbook_barangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'tanggal',
        'nama',
        'driver',
        'plat',
        'tujuan',
        'barcode'
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
        return Logbook_barang::class;
    }
}
