<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class IfrsEntitiesResource extends JsonResource
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
            'currency_id' => $this->currency_id,
            'parent_id' => $this->parent_id,
            'name' => $this->name,
            'multi_currency' => $this->multi_currency,
            'mid_year_balances' => $this->mid_year_balances,
            'year_start' => $this->year_start,
            'destroyed_at' => $this->destroyed_at,
            'locale' => $this->locale
        ];
    }
}
