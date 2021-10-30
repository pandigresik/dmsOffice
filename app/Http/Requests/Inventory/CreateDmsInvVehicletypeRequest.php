<?php

namespace App\Http\Requests\Inventory;

use App\Models\Inventory\DmsInvVehicletype;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsInvVehicletypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_inv_vehicletype-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsInvVehicletype::$rules;
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
        $keys = (new DmsInvVehicletype())->fillable;

        return parent::all($keys);
    }
}
