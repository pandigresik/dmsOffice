<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleGroupResource extends JsonResource
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
            'capacity' => $this->capacity,
            'uom' => $this->uom,
            'description' => $this->description,
        ];
    }
}
