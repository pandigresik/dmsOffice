<?php

namespace App\Repositories\Sales;

use App\Models\Sales\DmsSdRouteitem;
use App\Repositories\BaseRepository;

/**
 * Class DmsSdRouteitemRepository
 * @package App\Repositories\Sales
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsSdRouteitemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'intItemNumber',
        'szCustomerId',
        'intDay1',
        'intDay2',
        'intDay3',
        'intDay4',
        'intDay5',
        'intDay6',
        'intDay7',
        'intWeek1',
        'intWeek2',
        'intWeek3',
        'intWeek4'
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
        return DmsSdRouteitem::class;
    }
}
