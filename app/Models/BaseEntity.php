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
        \Log::error('user '.$user);
        if (!is_null($user) && !is_null($user->entity_id)) {
            $idConnection = config('entity.entityConnection')[$user->entity_id] ?? null;
            \Log::error('connection '.$idConnection);
            if (!empty($idConnection)) {
                $this->setConnection($idConnection);
            }
        }
        parent::__construct($attributes);
        \Log::error('current connection '.$this->getTable().' using '.$this->getConnectionName());
    }
}
