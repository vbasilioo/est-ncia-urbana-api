<?php

namespace App\Http\Requests\Property;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'monthly_rent' => 'required',
            'number_of_rooms' => 'required',
            'number_of_bathrooms' => 'required',
            'status' => 'required|in:AVAILABLE,RENTED,UNAVAILABLE',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->input('id'),
        ]);
    }
}
