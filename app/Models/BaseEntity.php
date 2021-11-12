<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class BaseEntity extends Base
{
    /**
     * Create a new Eloquent model instance.
     */
    public function __construct(array $attributes = [])
    {
        $user = Auth::user();

        if (!is_null($user) && !is_null($user->entity_id)) {
            $idConnection = config('entity.entityConnection')[$user->entity_id] ?? null;

            if (!empty($idConnection)) {
                $this->setConnection($idConnection);
            }
        }
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->setConnection(config('database.default'))->belongsTo(\App\Models\Base\User::class, static::CREATED_BY);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->setConnection(config('database.default'))->belongsTo(\App\Models\Base\User::class, static::UPDATED_BY);
    }
}
