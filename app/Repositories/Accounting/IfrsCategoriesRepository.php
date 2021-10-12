<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsCategories;
use App\Repositories\BaseRepository;

/**
 * Class IfrsCategoriesRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsCategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'category_type',
        'name',
        'destroyed_at'
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
        return IfrsCategories::class;
    }
}
