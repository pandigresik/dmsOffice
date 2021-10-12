<?php

namespace App\Http\Requests\API\Accounting;

use App\Models\Accounting\IfrsVats;
use InfyOm\Generator\Request\APIRequest;

class UpdateIfrsVatsAPIRequest extends APIRequest
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
        $rules = IfrsVats::$rules;
        
        return $rules;
    }
}
