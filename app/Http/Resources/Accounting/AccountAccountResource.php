<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountAccountResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'company_id' => $this->company_id,
            'is_off_balance' => $this->is_off_balance,
            'reconcile' => $this->reconcile,
            'internal_type' => $this->internal_type,
            'internal_group' => $this->internal_group,
            'note' => $this->note,
        ];
    }
}
