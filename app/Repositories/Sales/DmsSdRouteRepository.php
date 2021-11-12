<?php

namespace App\Repositories\Sales;

use App\Models\Sales\DmsSdRoute;
use App\Repositories\BaseRepository;

/**
 * Class DmsSdRouteRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsSdRouteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szRouteType',
        'szEmployeeId',
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
        return DmsSdRoute::class;
    }
}
