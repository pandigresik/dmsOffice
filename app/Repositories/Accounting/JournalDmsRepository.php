<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
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
        $this->model->getConnection()->beginTransaction();

        try {
            $this->removePreviousData($input);
            $type = $input['type'];
            
            switch($type){
                case 'JBY':
                    $this->model->jurnalBiaya($input);                    
                break;
                case 'JPT':
                    $this->model->jurnalPenjualanTunai($input);
                break;
                case 'JPK':
                    $this->model->jurnalPenjualanKredit($input);
                break;
                case 'JBL':
                    $this->model->jurnalPembelian($input);
                break;
                case 'NRC':
                    $this->model->jurnalNeraca($input);
                break;
                default:
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
        JournalAccount::whereBetween('date', [$startDate, $endDate])->where(['branch_id' => $branchId, 'type' => $type])->forceDelete();
    }
}
