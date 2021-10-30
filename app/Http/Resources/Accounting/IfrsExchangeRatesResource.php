<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class IfrsExchangeRatesResource extends JsonResource
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
            'currency_id' => $this->currency_id,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'rate' => $this->rate,
            'destroyed_at' => $this->destroyed_at,
        ];
    }
}
