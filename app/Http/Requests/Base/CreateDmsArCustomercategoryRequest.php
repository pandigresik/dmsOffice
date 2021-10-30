<?php

namespace App\Http\Requests\Base;

use App\Models\Base\DmsArCustomercategory;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsArCustomercategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_ar_customercategory-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsArCustomercategory::$rules;
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
        $keys = (new DmsArCustomercategory())->fillable;

        return parent::all($keys);
    }
}
