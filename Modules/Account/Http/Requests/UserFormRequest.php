<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\User;
use Modules\Account\Forms\UserForm;

class UserFormRequest extends FormRequest
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
        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required_with:password,new_password', 'string', 'max:255', 'unique:users'
            ],
            'email' => ['required_with:password,new_password', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required_with:name,email', 'string', 'min:8'],
            'password_confirmation' => ['sometimes', 'required_with:password', 'string', 'min:8', 'same:password'],

            'current_password' => ['sometimes', 'current_password'],
            'new_password' => ['sometimes', 'string', 'min:8', 'confirmed'],

            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'birthDate' => ['nullable', 'date'],
            'biography' => ['nullable', 'string', 'max:255'],
        ];
    }

}
