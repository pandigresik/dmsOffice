<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'include_initial_balance' => $this->include_initial_balance,
            'type' => $this->type,
            'internal_group' => $this->internal_group,
            'note' => $this->note
        ];
    }
}
