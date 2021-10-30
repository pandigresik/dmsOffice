<?php

namespace App\Http\Requests\Sales;

use App\Models\Sales\DmsSdPricecatalog;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsSdPricecatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_sd_pricecatalog-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsSdPricecatalog::$rules;
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
        $keys = (new DmsSdPricecatalog())->fillable;

        return parent::all($keys);
    }
}
