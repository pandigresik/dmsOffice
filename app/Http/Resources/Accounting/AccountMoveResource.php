<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountMoveResource extends JsonResource
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
            'company_id' => $this->company_id,
            'account_journal_id' => $this->account_journal_id,
            'ref' => $this->ref,
            'date' => $this->date,
            'state' => $this->state,
            'amount' => $this->amount,
            'move_type' => $this->move_type,
            'narration' => $this->narration,
            'stock_picking_id' => $this->stock_picking_id
        ];
    }
}
