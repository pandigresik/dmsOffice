<?php

namespace App\Http\Requests\Finance;

use App\Models\Finance\AccountMove;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountMoveRequest extends FormRequest
{
    private $excludeKeys = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'account_move-update';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = AccountMove::$rules;

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
        $keys = (new AccountMove())->fillable;
        $keys = $this->excludeKeys ? array_diff($keys, $this->excludeKeys) : $keys;
        $keys = array_merge(['account_move_line'], $keys);

        return parent::all($keys);
    }
}
