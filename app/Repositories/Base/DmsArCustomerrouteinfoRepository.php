<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArCustomerrouteinfo;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomerrouteinfoRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArCustomerrouteinfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'intItemNumber',
        'szRouteType',
        'szEmployeeId',
        'bMon',
        'bTue',
        'bWed',
        'bThu',
        'bFri',
        'bSat',
        'bSun',
        'bWeek1',
        'bWeek2',
        'bWeek3',
        'bWeek4',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
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
        return DmsArCustomerrouteinfo::class;
    }
}
