<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
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

    public function list($startDate, $endDate)
    {
        $saldo = $this->getSaldoUntil($startDate);
        $data = $this->model->with(['transferCashBankDetails'])
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date')
            ->get()
            ->groupBy('transaction_date')
            ;

        return [
            'data' => $data,
            'saldo' => $saldo,
        ];
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

    private function getSaldoUntil($startDate)
    {
        $firstDate = substr($startDate, 0, 8).'01';
        $saldo = AccountBalance::select('code', 'amount')->whereBalanceDate($firstDate)->whereIn('code', ['kas_besar', 'kas_kecil', 'giro'])->get()->pluck('amount', 'code');
        $result = ['kas_kecil' => $saldo['kas_kecil'] ?? 0, 'kas_besar' => $saldo['kas_besar'] ?? 0, 'giro' => $saldo['giro'] ?? 0];
        $data = TransferCashBank::selectRaw('type_account, sum(case when type = \'KM\' then transfer_cash_bank_detail.amount else -transfer_cash_bank_detail.amount end) as amount')
            ->where('transaction_date', '>=', $firstDate)
            ->where('transaction_date', '<', $startDate)
            ->join('transfer_cash_bank_detail', function ($join) {
                $join->on('transfer_cash_bank.id', '=', 'transfer_cash_bank_detail.transfer_cash_bank_id');
            })
            ->groupBy('type_account')
            ->get()
            ->keyBy('type_account')->each(function ($item, $key) use (&$result) {
                $result[$key] += $item->amount;
            });

        return $result;
    }
}
