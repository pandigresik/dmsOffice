<?php

namespace App\Http\Requests\Accounting;

use App\Models\Accounting\TransferCashBank;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransferCashBankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'transfer_cash_bank-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return TransferCashBank::$rules;
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
        $keys = (new TransferCashBank())->fillable;
        $keys = array_merge(['transfer_cash_bank_detail'], $keys);

        return parent::all($keys);
    }
}
