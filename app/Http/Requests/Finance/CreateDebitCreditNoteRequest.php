<?php

namespace App\Http\Requests\Finance;

use App\Models\Finance\DebitCreditNote;
use Illuminate\Foundation\Http\FormRequest;

class CreateDebitCreditNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'debit_credit_note-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DebitCreditNote::$rules;
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
        $keys = (new DebitCreditNote())->fillable;

        return parent::all($keys);
    }
}
