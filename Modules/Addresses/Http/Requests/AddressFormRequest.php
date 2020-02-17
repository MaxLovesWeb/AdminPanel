<?php

namespace Modules\Addresses\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressFormRequest extends FormRequest
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
            'country_code' => [
                'nullable', 'string', 'max:255'
            ],
            'street' => [
                'nullable', 'string', 'max:255'
            ],
            'state' => [
                'nullable', 'string', 'max:255'
            ],
            'city' => [
                'nullable', 'string', 'max:255'
            ],
            'postcode' => [
                'nullable', 'string', 'max:255'
            ],
            'is_primary' => [
                'nullable', 'boolean'
            ],
            'is_billing' => [
                'nullable', 'boolean'
            ],
            'is_shipping' => [
                'nullable', 'boolean'
            ],
        ];
    }

}
