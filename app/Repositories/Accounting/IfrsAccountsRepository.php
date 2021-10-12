<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\IfrsAccounts;
use App\Repositories\BaseRepository;

/**
 * Class IfrsAccountsRepository
 * @package App\Repositories\Accounting
 * @version September 11, 2021, 2:08 pm UTC
*/

class IfrsAccountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'category_id',
        'currency_id',
        'code',
        'name',
        'description',
        'account_type',
        'destroyed_at'
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
        return IfrsAccounts::class;
    }

    /**
     * Update model record for given id.
     *
     * @param array $input
     * @param int   $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);
        if(isset($input['category_id'])){
            $model->category_id = $input['category_id'];
        }

        $model->save();

        return $model;
    }
}
