<?php

namespace Modules\Account\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\User;
use Modules\Account\Forms\UserForm;

class UpdateAuthPasswordFormRequest extends FormRequest
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
        return $this->only(
            'current_password', 'new_password', 'new_password_confirmation'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', 'password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'], //,
            //'new_password_confirmation' => ['required', 'same:new_password'],
        ];
    }

}
