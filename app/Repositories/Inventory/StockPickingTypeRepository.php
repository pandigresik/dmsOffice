<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\StockPickingType;
use App\Repositories\BaseRepository;

/**
 * Class StockPickingTypeRepository.
 *
 * @version August 15, 2021, 3:22 pm UTC
 */
class StockPickingTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
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
        return StockPickingType::class;
    }
}
