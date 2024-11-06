<?php

namespace App\Http\Requests\Address;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    use BasicFormRequestValidation;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:address,id',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->input('id'),
        ]);
    }
}
