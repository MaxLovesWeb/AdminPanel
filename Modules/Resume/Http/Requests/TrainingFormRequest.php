<?php

namespace Modules\Resume\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Account\Entities\User;
use Modules\Account\Forms\UserForm;

class TrainingFormRequest extends FormRequest
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
            'status' => [
                'nullable', 'string', 'max:255'
            ],
            'company' => [
                'required',
            ],
            'description' => [
                'nullable', 'string'
            ],
            'start_date' => [
                'nullable', 'date'
            ],
            'end_date' => [
                'nullable', 'date'
            ],
        ];
    }

}
