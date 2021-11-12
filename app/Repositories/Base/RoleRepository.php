<?php

namespace App\Repositories\Base;

use App\Models\Base\Role;
use App\Repositories\BaseRepository;

/**
 * Class RoleRepository.
 *
 * @version May 17, 2021, 3:48 am UTC
 */
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name',
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
        return Role::class;
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
        $model = parent::create($input);
        $permissions = $input['permissions'] ?? [];
        $model->syncPermissions($permissions);

        return $model;
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
        $model = parent::update($input, $id);
        $permissions = $input['permissions'] ?? [];
        $model->syncPermissions($permissions);

        return $model;
    }
}
