<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class IfrsVatsResource extends JsonResource
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
            'entity_id' => $this->entity_id,
            'account_id' => $this->account_id,
            'code' => $this->code,
            'name' => $this->name,
            'rate' => $this->rate,
            'destroyed_at' => $this->destroyed_at
        ];
    }
}
