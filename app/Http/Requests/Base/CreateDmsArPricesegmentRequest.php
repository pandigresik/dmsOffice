<?php

namespace App\Http\Requests\Base;

use App\Models\Base\DmsArPricesegment;
use Illuminate\Foundation\Http\FormRequest;

class CreateDmsArPricesegmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'dms_ar_pricesegment-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DmsArPricesegment::$rules;
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
        $keys = (new DmsArPricesegment())->fillable;

        return parent::all($keys);
    }
}
