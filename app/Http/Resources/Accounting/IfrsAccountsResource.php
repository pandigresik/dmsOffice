<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class IfrsAccountsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'entity_id' => $this->entity_id,
            'category_id' => $this->category_id,
            'currency_id' => $this->currency_id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'account_type' => $this->account_type,
            'destroyed_at' => $this->destroyed_at,
        ];
    }
}
