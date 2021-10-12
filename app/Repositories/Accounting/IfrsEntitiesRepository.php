<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsEntities;
use App\Repositories\BaseRepository;

/**
 * Class IfrsEntitiesRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsEntitiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'currency_id',
        'parent_id',
        'name',
        'multi_currency',
        'mid_year_balances',
        'year_start',
        'destroyed_at',
        'locale'
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
        return IfrsEntities::class;
    }
}
