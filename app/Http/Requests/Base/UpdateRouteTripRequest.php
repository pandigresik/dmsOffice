<?php

namespace App\Http\Requests\Base;

use App\Models\Base\RouteTrip;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteTripRequest extends FormRequest
{
    private $excludeKeys = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'route_trip-update';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $id = $this->route('routeTrip');        
        $rules = RouteTrip::$rules;
        $rules['name'] = $rules['name'].",name,$id";
        return $this->excludeKeys ? array_diff_key($rules, array_combine($this->excludeKeys, $this->excludeKeys)) : $rules;
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
        $keys = (new RouteTrip())->fillable;
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;

        return parent::all($keys);
    }
}
