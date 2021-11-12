<?php

namespace App\Repositories\Base;

use App\Models\Base\Uom;
use App\Repositories\BaseRepository;

/**
 * Class UomRepository.
 *
 * @version August 15, 2021, 3:20 pm UTC
 */
class UomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'uom_category_id',
        'factor',
        'uom_type',
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
        return Uom::class;
    }
}
