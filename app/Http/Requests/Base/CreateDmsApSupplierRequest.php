<?php

namespace App\Http\Requests\Base;

use App\Models\Base\DmsApSupplier;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsApSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_ap_supplier-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsApSupplier::$rules;
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
        $keys = (new DmsApSupplier())->fillable;
        $keys = array_merge(['contactSuppliers', 'locationSuppliers'], $keys);

        return parent::all($keys);
    }
}
