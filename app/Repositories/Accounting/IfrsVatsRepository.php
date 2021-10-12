<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsVats;
use App\Repositories\BaseRepository;

/**
 * Class IfrsVatsRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsVatsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'account_id',
        'code',
        'name',
        'rate',
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
        return IfrsVats::class;
    }
}
