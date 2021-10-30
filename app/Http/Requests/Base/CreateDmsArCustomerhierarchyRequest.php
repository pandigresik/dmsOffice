<?php

namespace App\Http\Requests\Base;

use App\Models\Base\DmsArCustomerhierarchy;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsArCustomerhierarchyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_ar_customerhierarchy-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsArCustomerhierarchy::$rules;
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
        $keys = (new DmsArCustomerhierarchy())->fillable;

        return parent::all($keys);
    }
}
