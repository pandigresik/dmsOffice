<?php

namespace App\Http\Requests\Purchase;

use App\Models\Purchase\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    private $excludeKeys = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'invoice-update';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Invoice::$rules;
        // if request from  InvoiceValidateController set rules as []
        if ($this->route()->getController() instanceof \App\Http\Controllers\Purchase\InvoiceValidateController) {
            return [];
        }

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
        $keys = (new Invoice())->fillable;
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;
        $keys = array_merge(['invoice_line'], $keys);

        return parent::all($keys);
    }
}
