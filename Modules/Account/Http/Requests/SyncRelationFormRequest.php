<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Modules\Account\Entities\User;

class SyncRelationFormRequest extends FormRequest
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
     * @throws \Exception
     */
    public function rules()
    {
        return [
            'relation' => ['required'],
            'ids' => ['array'], //\Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model|array  $ids
        ];
    }

}
