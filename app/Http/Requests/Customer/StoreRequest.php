<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,50',
            'email' => 'required|string|email|max:50|unique:customers',
            'phone' => 'required|unique:customers',
            'address' => 'required|string|between:1,255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->ajax()) {
            throw new HttpResponseException(
                sendValidationErrorResponse($validator->errors(), 'Validation failed.')
            );
        }
        parent::failedValidation($validator);
    }
}
