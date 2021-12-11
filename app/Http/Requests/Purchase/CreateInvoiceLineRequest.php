<?php

namespace App\Http\Requests\Purchase;

use App\Models\Purchase\InvoiceLine;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceLineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'invoice_line-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return InvoiceLine::$rules;
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
        $keys = (new InvoiceLine())->fillable;

        return parent::all($keys);
    }
}
