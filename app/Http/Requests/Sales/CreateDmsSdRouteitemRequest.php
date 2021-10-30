<?php

namespace App\Http\Requests\Sales;

use App\Models\Sales\DmsSdRouteitem;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsSdRouteitemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_sd_routeitem-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsSdRouteitem::$rules;
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
        $keys = (new DmsSdRouteitem())->fillable;

        return parent::all($keys);
    }
}
