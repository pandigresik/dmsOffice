<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArPaymentterm;
use App\Repositories\BaseRepository;

/**
 * Class DmsArPaymenttermRepository
 * @package App\Repositories\Base
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsArPaymenttermRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'intDueDate',
        'intDuePrintDate',
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
        return DmsArPaymentterm::class;
    }
}
