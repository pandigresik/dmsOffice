<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsCurrencies;
use App\Repositories\BaseRepository;

/**
 * Class IfrsCurrenciesRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsCurrenciesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'name',
        'currency_code',
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
        return IfrsCurrencies::class;
    }
}
