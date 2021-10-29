<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\DmsFinSubaccount;
use App\Repositories\BaseRepository;

/**
 * Class DmsFinSubaccountRepository
 * @package App\Repositories\Accounting
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsFinSubaccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
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
        return DmsFinSubaccount::class;
    }
}
