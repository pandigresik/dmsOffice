<?php

namespace App\Repositories;

use App\Models\Menus;
use App\Repositories\BaseRepository;

/**
 * Class MenusRepository
 * @package App\Repositories
 * @version July 27, 2021, 2:20 am UTC
*/

class MenusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'status',
        'icon',
        'route',
        'parent_id',
        'seq_number'
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
        return Menus::class;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $permission = $input['permission'] ?? null;
        if($permission){
            unset($input['permission']);
        }        
        $model = parent::create($input);
        if(!empty($permission)){
            $model->permissions()->attach($permission);
        }
        
        return $model;

    }    

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $permission = $input['permission'] ?? null;
        if($permission){
            unset($input['permission']);
        }
        
        $model = parent::update($input, $id);
        $model->permissions()->detach();
        if(!empty($permission)){
            $model->permissions()->attach($permission);
        }        
        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();
        $query->with(['permissions']);
        return $query->find($id, $columns);
    }
}
