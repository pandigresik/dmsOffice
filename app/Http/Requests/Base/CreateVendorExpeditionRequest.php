<?php

namespace App\Http\Requests\Base;

use App\Models\Base\VendorExpedition;
use Illuminate\Foundation\Http\FormRequest;

class CreateVendorExpeditionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'vendor_expedition-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return VendorExpedition::$rules;
    }

    /**
     * Get all of the input based value from property fillable  in model and files for the request.
     *
     * @param null|array|mixed $keys
     *
     * @return array
     */
    public function all($keys = null)
    {
        $keys = (new VendorExpedition())->fillable;
        array_push($keys, 'trips');
        return parent::all($keys);
    }
}
