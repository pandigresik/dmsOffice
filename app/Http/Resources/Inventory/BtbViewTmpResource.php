<?php

namespace App\Http\Resources\Inventory;

use Illuminate\Http\Resources\Json\JsonResource;

class BtbViewTmpResource extends JsonResource
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
            'Tgl_BTB' => $this->Tgl_BTB,
            'No_BTB' => $this->No_BTB,
            'ID_Vendor' => $this->ID_Vendor,
            'Nama_Vendor' => $this->Nama_Vendor,
            'Nama_PT' => $this->Nama_PT,
            'No_CO' => $this->No_CO,
            'No_DN' => $this->No_DN,
            'Tgl_sjp' => $this->Tgl_sjp,
            'Depo' => $this->Depo,
            'Nama_Produk' => $this->Nama_Produk
        ];
    }
}
