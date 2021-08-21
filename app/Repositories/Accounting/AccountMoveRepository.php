<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountMove;
use App\Repositories\BaseRepository;

/**
 * Class AccountMoveRepository
 * @package App\Repositories\Accounting
 * @version August 21, 2021, 2:11 pm UTC
*/

class AccountMoveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company_id',
        'account_journal_id',
        'ref',
        'date',
        'state',
        'amount',
        'move_type',
        'narration',
        'stock_picking_id'
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
        return AccountMove::class;
    }
}
