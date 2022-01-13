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

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();        
        try {
            $model = $this->model->newInstance($input);
            $lines = $input['account_move_line'];
            $model->number = $model->getNextNumber();
            $model->state = AccountMove::POSTED;
            $model->save();
            
            $this->setAccountLines($lines, $model);
            $this->postJournalLines($lines, $model);
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
            $lines = $input['account_move_line'];
            $model = parent::update($input, $id);            
            $this->setAccountLines($lines, $model);
            $this->postJournalLines($lines, $model);
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }

        return $this->model;
    }

    private function setAccountLines($lines, $model)
    {
        if (!empty($lines)) {
            $model->lines()->forceDelete();
            foreach ($lines['account_id'] as $key => $line) {                
                $model->lines()->create([
                    'name' => $lines['name'][$key],
                    'description' => $lines['description'][$key],
                    'account_id' => $lines['account_id'][$key],
                    'debit' => $lines['debit'][$key],
                    'credit' => $lines['credit'][$key],
                    'balance' => $lines['debit'][$key] - $lines['credit'][$key],
                ]);
            }
        }
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $model->lines()->forceDelete();
        $model->journals()->forceDelete();
        return $model->delete();
    }

    public function postJournalLines($lines, $model){
        if (!empty($lines)) {
            $model->journals()->forceDelete();
            foreach ($lines['account_id'] as $key => $line) {                
                $model->journals()->create([                    
                    'name' => $lines['name'][$key],
                    'date' => $model->getRawOriginal('date'),
                    'reference' => $model->number,
                    'description' => $lines['description'][$key],
                    'account_id' => $lines['account_id'][$key],
                    'debit' => $lines['debit'][$key],
                    'credit' => $lines['credit'][$key],
                    'balance' => $lines['debit'][$key] - $lines['credit'][$key],
                    'branch_id' => $model->branch_id ?? NULL
                ]);
            }
        }
    }
}
