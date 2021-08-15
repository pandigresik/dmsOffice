<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteTripResource extends JsonResource
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
            'description' => $this->description,
            'vehicle_group_id' => $this->vehicle_group_id,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'price' => $this->price,
        ];
    }
}
