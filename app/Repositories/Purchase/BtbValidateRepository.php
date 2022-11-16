<?php

namespace App\Repositories\Purchase;

use App\Models\Accounting\JournalAccount;
use App\Models\Purchase\BtbValidate;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class BtbValidateRepository.
 *
 * @version November 25, 2021, 5:35 am WIB
 */
class BtbValidateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'product_id',
        'uom_id',
        'ref_doc',
        'qty',
        'qty_retur',
        'qty_reject',
        'invoiced',
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
        return BtbValidate::class;
    }

    public function mustValidate($startDate, $endDate, $branchId)
    {
        return $this->model->mustValidate($startDate, $endDate, $branchId);
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
        DB::beginTransaction();

        try {
            $btb = $input['btb'] ?? [];
            $model = null;
            if (!empty($btb)) {
                $groupingBtb = collect($btb)->mapToGroups(function ($item) {
                    $arr = json_decode($item, 1);

                    return [$arr['jenis'] => $arr['no_btb']];
                });

                foreach ($groupingBtb as $key => $vc) {
                    switch ($key) {
                        case 'BTB Supplier':
                            $model = $this->model->insertBtbSupplier($vc);
                            $this->model->insertSubsidiOA($vc);
                            break;
                        case 'BTB Distribusi':
                            $model = $this->model->insertBtbDistribusi($vc);

                            break;
                    }
                }
            }
            $journalAccount = new JournalAccount();
            $journalAccount->jurnalHutangBTB($vc);            
            DB::commit();
            // flush cache karena menggunakan from query untuk eksekusi statement insert into
            $this->model->flushCache();
            $journalAccount->flushCache();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);

            return $e;
        }
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $this->model->getConnection()->commit();
            $model = $this->model->updateEkspedisi($id, $input);
            $journal = JournalAccount::whereIn('account_id', ['825010', '211104'])->where(['reference' => $model->doc_id, 'type' => 'JBTB'])->get();
            if($journal->isEmpty()){
                JournalAccount::create([
                    'account_id' => 825010,
                    'branch_id' => $model->branch_id,
                    'date' => $model->getRawOriginal('btb_date'),
                    'name' => 'Biaya Pengangkutan',
                    'debit' => $model->getRawOriginal('shipping_cost'),
                    'credit' => 0,
                    'balance' => $model->getRawOriginal('shipping_cost'),
                    'reference' => $model->doc_id,
                    'type' => 'JBTB',
                    'state' => 'posted',
                ]);
                JournalAccount::create([
                    'account_id' => 211104,
                    'branch_id' => $model->branch_id,
                    'date' => $model->getRawOriginal('btb_date'),
                    'name' => 'Hutang ongkos angkut',
                    'debit' => $model->getRawOriginal('shipping_cost'),
                    'credit' => 0,
                    'balance' => $model->getRawOriginal('shipping_cost'),
                    'reference' => $model->doc_id,
                    'type' => 'JBTB',
                    'state' => 'posted',
                ]);
            }else{
                foreach($journal as $j){
                    $j->debit = $model->getRawOriginal('shipping_cost');
                    $j->balance = $model->getRawOriginal('shipping_cost');
                    $j->save();
                }
            }
            // flush cache karena menggunakan from query untuk eksekusi statement insert into
            $this->model->flushCache();

            return $model;
        } catch (\Exception $e) {
            Log::error($e);
            $this->model->getConnection()->rollBack();

            return $e;
        }
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return null|bool|mixed
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        JournalAccount::where(['type' => 'JBTB','reference' => $model->doc_id, 'branch_id' => $model->branch_id])->forceDelete();
        
        return $model->forceDelete();
    }
}
