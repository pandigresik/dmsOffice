<?php

namespace App\Http\Requests\Accounting;

use App\Models\Accounting\JournalAccount;
use Illuminate\Foundation\Http\FormRequest;

class CreateJournalDmsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'journaldms-create';

        return \Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'branch_id' => 'required|array',
            'type' => 'required|array',
        ];
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
        $keys = (new JournalAccount())->fillable;
        $keys = array_merge(['period_range', 'journal_line', 'type_excel','branch_id_excel'], $keys);

        return parent::all($keys);
    }
}
