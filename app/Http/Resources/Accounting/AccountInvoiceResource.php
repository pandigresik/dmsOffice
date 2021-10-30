<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountInvoiceResource extends JsonResource
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
            'number' => $this->number,
            'amount_total' => $this->amount_total,
            'company_id' => $this->company_id,
            'vendor_id' => $this->vendor_id,
            'account_journal_id' => $this->account_journal_id,
            'type' => $this->type,
            'references' => $this->references,
            'comment' => $this->comment,
            'state' => $this->state,
            'date_invoice' => $this->date_invoice,
            'date_due' => $this->date_due,
        ];
    }
}
