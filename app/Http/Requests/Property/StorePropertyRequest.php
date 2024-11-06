<?php

namespace App\Http\Requests\Property;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'monthly_rent' => 'required|numeric',
            'number_of_rooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'status' => 'required|in:AVAILABLE,RENTED,UNAVAILABLE',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id'
        ];
    }
}
