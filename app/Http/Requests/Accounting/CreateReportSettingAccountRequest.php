<?php

namespace App\Http\Requests\Accounting;

use App\Models\Accounting\ReportSettingAccount;
use Illuminate\Foundation\Http\FormRequest;

class CreateReportSettingAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'report_setting_account-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ReportSettingAccount::$rules;
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
        $keys = (new ReportSettingAccount())->fillable;
        $keys = array_merge(['details'], $keys);

        return parent::all($keys);
    }
}
