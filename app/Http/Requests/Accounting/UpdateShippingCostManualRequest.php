<?php

namespace App\Http\Requests\Accounting;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Accounting\ShippingCostManual;

class UpdateShippingCostManualRequest extends FormRequest
{
    private $excludeKeys = []; 

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'shipping_cost_manual-update';
        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ShippingCostManual::$rules;
        
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
        $keys = (new ShippingCostManual)->fillable;
        $keys = array_merge(['details'], $keys);
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;
        return parent::all($keys);
    }
}