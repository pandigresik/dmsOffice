<?php

namespace App\Http\Requests\Sales;

use App\Models\Sales\Discounts;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountsRequest extends FormRequest
{
    private $excludeKeys = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'discounts-update';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $jenis = $this->get('jenis');

        switch ($jenis) {
            case 'kontrak':
                $rules = Discounts::$rulesKontrak;

                break;
            case 'combine':
                $rules = Discounts::$rulesCombine;

                break;
            default:
                $rules = Discounts::$rules;
        }

        return $rules;
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
        $keys = (new Discounts())->fillable;
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;
        $keys = array_merge(['period', 'discount_members', 'discount_details'], $keys);

        return parent::all($keys);
    }
}
