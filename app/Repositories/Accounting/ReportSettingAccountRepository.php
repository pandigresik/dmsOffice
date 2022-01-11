<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\ReportSettingAccount;
use App\Repositories\BaseRepository;

/**
 * Class ReportSettingAccountRepository
 * @package App\Repositories\Accounting
 * @version January 11, 2022, 8:54 pm WIB
*/

class ReportSettingAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'group',
        'group_type'
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
        return ReportSettingAccount::class;
    }

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();        
        try {
            $model = $this->model->newInstance($input);
            $details = $input['details'];            
            $model->save();
            
            $this->setDetails($details, $model);
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }

        return $this->model;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();        
        try {
            $model = $this->model->newInstance($input);
            $details = $input['details'];
            $model = parent::update($input, $id);            
            $this->setDetails($details, $model);
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }

        return $this->model;
    }

    private function setDetails($details, $model)
    {
        if (!empty($details)) {
            $model->details()->forceDelete();            
            foreach ($details as $key => $accountId) {
                $model->details()->create([
                    'account_id' => $accountId
                ]);
            }
        }
    }
}
