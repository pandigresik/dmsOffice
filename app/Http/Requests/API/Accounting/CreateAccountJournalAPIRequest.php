<?php

namespace App\Http\Requests\API\Accounting;

use App\Models\Accounting\AccountJournal;
use InfyOm\Generator\Request\APIRequest;

class CreateAccountJournalAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return AccountJournal::$rules;
    }
}
