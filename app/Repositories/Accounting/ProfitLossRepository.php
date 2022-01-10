<?php

namespace App\Repositories\Accounting;

use App\Models\Sales\BkbDiscounts;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class ProfitLossRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'szBranchId',
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
        return BkbDiscounts::class;
    }
}
