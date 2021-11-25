<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;

class ListBtbValidate extends Model
{
    public $table = 'list_btb_validate';
    public $isCachable = false;

    public function getFullIdentityAttribute($value)
    {        
        return implode(' | ', ['BTB::'.$this->no_btb, 'CO::'.$this->co_reference, 'Product::'.$this->product_name]);
    }
}
