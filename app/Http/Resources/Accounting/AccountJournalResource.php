<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountJournalResource extends JsonResource
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
            'default_debit_account_id' => $this->default_debit_account_id,
            'default_credit_account_id' => $this->default_credit_account_id,
            'type' => $this->type,
        ];
    }
}
