<?php

namespace App\Http\Resources\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class IfrsReportingPeriodsResource extends JsonResource
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
            'period_count' => $this->period_count,
            'status' => $this->status,
            'calendar_year' => $this->calendar_year,
            'destroyed_at' => $this->destroyed_at,
            'closing_date' => $this->closing_date
        ];
    }
}
