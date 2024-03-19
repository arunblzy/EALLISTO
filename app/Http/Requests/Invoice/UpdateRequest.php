<?php

namespace App\Http\Requests\Invoice;

use App\Models\Invoice;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
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
            'customer' => 'required|exists:customers,id',
            'date' => 'required|date_format:d-m-Y',
            'amount' => 'required|numeric|min:0|max:9999999999',
            'status' => 'required|in:'.implode(',', array_values(Invoice::STATUSES)),
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
