<?php

namespace App\Http\Requests\Base;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Base\ShippingCostSubsidy;

class CreateShippingCostSubsidyRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'shipping_cost_subsidies-create';
        return Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ShippingCostSubsidy::$rules;
    }

    /**
     * Get all of the input based value from property fillable  in model and files for the request.
     *
     * @param null|array|mixed $keys
     *
     * @return array
    */
    public function all($keys = null){
        $keys = (new ShippingCostSubsidy)->fillable;
        return parent::all($keys);
    }
}
