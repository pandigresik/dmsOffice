<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Repositories\BaseRepository;

/**
 * Class AccountBalanceRepository.
 *
 * @version January 21, 2022, 8:19 am WIB
 */
class AccountBalanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'amount',
        'balance_date',
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
        return AccountBalance::class;
    }

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $startDate = $input['balance_date'];
            $this->removePreviousData($startDate);
            $this->model->copyBalance($startDate);
            $this->model->getConnection()->commit();
            $this->model->flushCache();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e->getMessage();
        }

        return $this->model;
    }

    private function removePreviousData($startDate)
    {
        $this->model->whereBalanceDate($startDate)->forceDelete();
    }
}
