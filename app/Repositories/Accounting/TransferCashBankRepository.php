<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\TransferCashBank;
use App\Repositories\BaseRepository;

/**
 * Class TransferCashBankRepository.
 *
 * @version March 14, 2022, 9:37 pm WIB
 */
class TransferCashBankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_account',
        'number',
        'transaction_date',
        'type',
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
        return TransferCashBank::class;
    }

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $transferDetail = $input['transfer_cash_bank_detail'];
            $model = $this->model->newInstance($input);
            $model->number = $model->getNextNumber($input['type']);
            $model->save();
            $this->setDetails($transferDetail, $model);
            $this->model->getConnection()->commit();

            return $model;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return false;
        }
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $transferDetail = $input['transfer_cash_bank_detail'];
            $model = parent::update($input, $id);
            $this->setDetails($transferDetail, $model);
            $this->model->getConnection()->commit();

            return $model;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return false;
        }
    }

    private function setDetails($transferDetail, $model)
    {
        $model->transferCashBankDetails()->forceDelete();
        if (!empty($transferDetail)) {
            foreach ($transferDetail['no_reference'] as $key => $item) {
                $model->transferCashBankDetails()->create([
                    'no_reference' => $transferDetail['no_reference'][$key] ?? null,
                    'account' => $transferDetail['account'][$key] ?? null,
                    'description' => $transferDetail['description'][$key] ?? null,
                    'amount' => $transferDetail['amount'][$key] ?? null,
                    'pic' => $transferDetail['pic'][$key] ?? null,
                ]);
            }
        }
    }
}
