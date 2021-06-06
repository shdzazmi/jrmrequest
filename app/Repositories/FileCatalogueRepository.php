<?php

namespace App\Repositories;

use App\Models\FileCatalogue;
use App\Repositories\BaseRepository;

/**
 * Class FileCatalogueRepository
 * @package App\Repositories
 * @version May 28, 2021, 8:28 am WITA
*/

class FileCatalogueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nama',
        'file_path',
        'cover_path'
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
        return FileCatalogue::class;
    }
}
