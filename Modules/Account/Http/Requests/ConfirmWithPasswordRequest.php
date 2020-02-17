<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\Account;
use Modules\Account\Forms\AccountForm;

class ConfirmWithPasswordRequest extends FormRequest
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        return $this->only('password');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'password', //'password:web'
        ];
    }
    
}
