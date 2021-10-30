<?php

namespace App\Http\Requests\Inventory;

use App\Models\Inventory\SynchronizeInStockPicking;
use Illuminate\Foundation\Http\FormRequest;

class CreateSynchronizeInStockPickingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'btb_view_tmp-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return SynchronizeInStockPicking::$rules;
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
        $keys = (new SynchronizeInStockPicking())->fillable;

        return parent::all($keys);
    }
}
