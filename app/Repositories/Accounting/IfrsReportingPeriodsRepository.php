<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsReportingPeriods;
use App\Repositories\BaseRepository;

/**
 * Class IfrsReportingPeriodsRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsReportingPeriodsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'period_count',
        'status',
        'calendar_year',
        'destroyed_at',
        'closing_date'
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
        return IfrsReportingPeriods::class;
    }
}
