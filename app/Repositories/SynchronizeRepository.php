<?php

namespace App\Repositories;

use App\Models\Synchronize;

/**
 * Class SynchronizeRepository.
 *
 * @version November 3, 2021, 7:32 am UTC
 */
class SynchronizeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'table_name',
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     */
    public function model()
    {
        return Synchronize::class;
    }
}
