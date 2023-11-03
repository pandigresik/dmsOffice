<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\JournalAccountDetail;
use App\Repositories\BaseRepository;

/**
 * Class JournalDmsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class JournalDmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return JournalAccount::class;
    }

    public function create($input)
    {
        $input['branch_id'] = $input['branch_id'] ?? $input['branch_id_excel'];
        $input['type'] = $input['type'] ?? $input['type_id_excel'];
        $this->model->getConnection()->beginTransaction();
        $loopBranch = is_array($input['branch_id']) ? $input['branch_id'] : [$input['branch_id']];
        $loopType = is_array($input['type']) ? $input['type'] : [$input['type']];
        try {
            $this->removePreviousData($input);
            foreach($loopBranch as $branch){
                foreach($loopType as $type){
                    $input['type'] = $type;
                    $input['branch_id'] = $branch;

                    switch ($type) {
                        case 'JBY':
                            $this->model->jurnalBiaya($input);
        
                        break;
                        case 'JPT':
                            $this->model->jurnalPenjualanTunai($input);
                            $this->model->jurnalPPNKeluaran($input);
        
                        break;
                        case 'JPK':
                            $this->model->jurnalPenjualanKredit($input);
                            $this->model->jurnalPPNKeluaran($input);
        
                        break;
                        case 'JBL':
                            $this->model->jurnalPembelian($input);
        
                        break;
                        case 'NRC':
                            $this->model->jurnalNeraca($input);
                        break;
                        case 'NGL':
                            $this->model->jurnalNeracaNonGL($input);
                        case 'JBTB':
                            $this->model->jurnalHutangBTB($input);
                        break;
                        case 'XLS_SCR':
                        case 'XLS_SLR':
                        case 'XLS_INS':
                        case 'XLS_AFL':
                            $this->uploadExcelJournal($input);
                        
                        break;
                        default:
                    }
                }
            }                        
            $this->model->getConnection()->commit();
            $this->model->flushCache();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e->getMessage();
        }

        return $this->model;
    }

    private function removePreviousData($input)
    {
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];
        JournalAccount::whereBetween('date', [$startDate, $endDate])->whereIn('branch_id' ,$branchId)->whereIn('type', $type)->forceDelete();
    }

    private function uploadExcelJournal($input){
        $type = $input['type'];
        $branch_id = $input['branch_id'];
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $journalLine = $input['journal_line'];
        foreach($journalLine as $line){
            $item = json_decode($line, 1);            
            if (!isset($item['No Akun Debet (L/R)'])) {
                continue;
            }
            $deskripsi = $item['Nama Karyawan'] ?? ($item['Nama'] ?? $item['Deskripsi']) ;
            $journalDebet = JournalAccount::create([
                'account_id' => $item['No Akun Debet (L/R)'],
                'branch_id' => $branch_id,
                'date' => $item['Tgl'] ? \Carbon\Carbon::parse($item['Tgl']) : $endDate,
                'name' => substr($deskripsi,0, 100),
                'debit' => $item['UPLOAD'],
                'credit' => 0,
                'balance' => $item['UPLOAD'],
                'reference' => null,
                'type' => $type,
                'state' => 'posted',
            ]);
            $journalDebet->detail()->create(
                [
                'account_id' => $item['No Akun Debet (L/R)'],
                'branch_id' => $branch_id,
                'date' => $item['Tgl'] ? \Carbon\Carbon::parse($item['Tgl']) : $endDate,
                'additional_info' => $item
                ]
            );
            $journalCredit = JournalAccount::create([
                'account_id' => $item['No Akun Kredit (NRC)'],
                'branch_id' => $branch_id,
                'date' => $item['Tgl'] ? \Carbon\Carbon::parse($item['Tgl']) : $endDate,
                'name' => substr($deskripsi,0, 100),
                'debit' => 0,
                'credit' => $item['UPLOAD'],
                'balance' => -1 * $item['UPLOAD'],
                'reference' => null,
                'type' => $type,
                'state' => 'posted',
            ]);
            $journalCredit->detail()->create(
                [
                'account_id' => $item['No Akun Kredit (NRC)'],
                'branch_id' => $branch_id,
                'date' => $item['Tgl'] ? \Carbon\Carbon::parse($item['Tgl']) : $endDate,
                'additional_info' => $item
                ]
            );
        }
    }
}
