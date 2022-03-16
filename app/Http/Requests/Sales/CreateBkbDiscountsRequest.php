<?php

namespace App\Http\Requests\Sales;

use App\Models\Sales\BkbDiscounts;
use Illuminate\Foundation\Http\FormRequest;

class CreateBkbDiscountsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        $permissionName = 'bkb_discounts-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return []; //BkbDiscounts::$rules;s;
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
        $keys = (new BkbDiscounts())->fillable;
        $keys = array_merge($keys, ['szDocId', 'start_date', 'end_date', 'branch_id']);

        return parent::all($keys);
    }
}
