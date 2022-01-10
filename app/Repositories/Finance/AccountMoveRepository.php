<?php

namespace App\Repositories\Finance;

use App\Models\Finance\AccountMove;
use App\Repositories\BaseRepository;

/**
 * Class AccountMoveRepository
 * @package App\Repositories\Finance
 * @version January 9, 2022, 8:21 pm WIB
*/

class AccountMoveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'date',
        'reference',
        'narration',
        'state'
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
