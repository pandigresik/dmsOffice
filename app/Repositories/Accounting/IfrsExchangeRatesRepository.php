<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsExchangeRates;
use App\Repositories\BaseRepository;

/**
 * Class IfrsExchangeRatesRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsExchangeRatesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'currency_id',
        'valid_from',
        'valid_to',
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
        return IfrsExchangeRates::class;
    }
}
