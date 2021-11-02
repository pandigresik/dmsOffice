<?php

namespace App\Http\Requests\Inventory;

use App\Models\Inventory\DmsInvCarrier;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsInvCarrierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_inv_carrier-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsInvCarrier::$rules;
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
        $keys = (new DmsInvCarrier())->fillable;
        $keys = array_merge(['contactEkspedisis', 'locationEkspedisis', 'vehicleEkspedisis', 'tripEkspedisis'], $keys);

        return parent::all($keys);
    }
}
