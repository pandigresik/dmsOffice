<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Inventory\ProductStock;

class UpdateProductStockRequest extends FormRequest
{
    private $excludeKeys = []; 

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'product_stock-update';
        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ProductStock::$rules;
        
        $rules = $this->excludeKeys ? array_diff_key($rules, array_combine($this->excludeKeys, $this->excludeKeys)) : $rules;
        return $rules;
    }

    /**
     * Get all of the input based value from property fillable  in model and files for the request.
     *
     * @param null|array|mixed $keys
     *
     * @return array
    */
    public function all($keys = null){
        $keys = (new ProductStock)->fillable;
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;
        return parent::all($keys);
    }
}
