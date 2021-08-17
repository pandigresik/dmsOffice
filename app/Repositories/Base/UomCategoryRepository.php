<?php

namespace App\Repositories\Base;

use App\Models\Base\UomCategory;
use App\Repositories\BaseRepository;

/**
 * Class UomCategoryRepository
 * @package App\Repositories\Base
 * @version August 15, 2021, 3:20 pm UTC
*/

class UomCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return UomCategory::class;
    }
}
