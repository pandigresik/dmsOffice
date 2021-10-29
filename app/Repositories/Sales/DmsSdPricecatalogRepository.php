<?php

namespace App\Repositories\Sales;

use App\Models\Sales\DmsSdPricecatalog;
use App\Repositories\BaseRepository;

/**
 * Class DmsSdPricecatalogRepository
 * @package App\Repositories\Sales
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsSdPricecatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szCombinationId',
        'szCompanyId',
        'dtmValidFrom',
        'dtmValidTo',
        'intPriority',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated'
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
        return DmsSdPricecatalog::class;
    }
}
