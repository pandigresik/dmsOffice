<?php

namespace App\Http\Resources\Inventory;

use Illuminate\Http\Resources\Json\JsonResource;

class StockPickingResource extends JsonResource
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
            'warehouse_id' => $this->warehouse_id,
            'stock_picking_type_id' => $this->stock_picking_type_id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'state' => $this->state,
            'external_references' => $this->external_references,
            'vendor_id' => $this->vendor_id,
            'note' => $this->note,
        ];
    }
}
