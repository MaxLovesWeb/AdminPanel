<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\Account;
use Modules\Account\Forms\AccountForm;

class CreateAccountFormRequest extends FormRequest
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
        return $this->input(AccountForm::INPUTS_ARRAY);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Account::$rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return Account::$messages;
    }
}
