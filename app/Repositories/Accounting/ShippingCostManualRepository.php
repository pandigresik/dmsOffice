<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ShippingCostManual;
use App\Models\Accounting\ShippingCostManualDetail;
use App\Repositories\BaseRepository;

/**
 * Class ShippingCostManualRepository.
 *
 * @version February 22, 2022, 1:58 pm WIB
 */
class ShippingCostManualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'origin_branch_id',
        'destination_branch_id',
        'carrier_id',
        'date',
        'do_references',
        'sj_references',
        'amount',
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
        return ShippingCostManual::class;
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
            $details = $input['details'];
            $model = $this->model->newInstance($input);
            $model->number = $model->getNextNumber();
            $model->save();
            $this->generateJournal($model);
            $this->createDetail($details, $model);

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $model;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $details = $input['details'];
            $model = parent::update($input, $id);
            $this->updateJournal($model);
            $this->removeDetail($model);
            $this->createDetail($details, $model);

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $model;
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $this->deleteJournal($model);
        $model->details()->forceDelete();
        
        return $model->forceDelete();
    }

    private function removeDetail($model)
    {
        ShippingCostManualDetail::where('shipping_cost_manual_id', $model->id)->forceDelete();
    }

    private function createDetail($details, $model)
    {
        foreach ($details as $k => $r) {
            $model->details()->create($r);
        }
    }
    private function updateJournal($model){
        JournalAccount::where(['reference' => $model->number, 'type' => 'JOAM'])->update(['date' => $model->getRawOriginal('date'),'debit' => $model->getRawOriginal('amount'),'balance' => $model->getRawOriginal('amount')]);
    }

    private function deleteJournal($model){
        JournalAccount::where(['reference' => $model->number, 'type' => 'JOAM'])->forceDelete();
    }

    private function generateJournal($model){
        JournalAccount::create([
            'account_id' => 825010,
            'branch_id' => $model->destination_branch_id,
            'date' => $model->getRawOriginal('date'),
            'name' => 'Biaya Pengangkutan',
            'debit' => $model->getRawOriginal('amount'),
            'credit' => 0,
            'balance' => $model->getRawOriginal('amount'),
            'reference' => $model->number,
            'type' => 'JOAM',
            'state' => 'posted',
        ]);
        JournalAccount::create([
            'account_id' => 211104,
            'branch_id' => $model->destination_branch_id,
            'date' => $model->getRawOriginal('date'),
            'name' => 'Hutang ongkos angkut',
            'debit' => $model->getRawOriginal('amount'),
            'credit' => 0,
            'balance' => $model->getRawOriginal('amount'),
            'reference' => $model->number,
            'type' => 'JOAM',
            'state' => 'posted',
        ]);
    }
}
