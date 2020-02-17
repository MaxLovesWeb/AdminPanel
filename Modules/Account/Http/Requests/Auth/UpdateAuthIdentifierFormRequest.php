<?php

namespace Modules\Account\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\User;
use Modules\Account\Forms\UserForm;

class UpdateAuthIdentifierFormRequest extends FormRequest
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
        return $this->only('name', 'email', 'password');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:users,name,'.$this->user()->getKey()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user()->getKey()],
            'password' => ['required', 'password'],
        ];
    }

}
