<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'number_registration' => $this->number_registration,
            'number_identity' => $this->number_identity,
            'vehicle_group_id' => $this->vehicle_group_id,
        ];
    }
}
