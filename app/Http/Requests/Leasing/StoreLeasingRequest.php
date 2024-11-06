<?php

namespace App\Http\Requests\Leasing;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeasingRequest extends FormRequest
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
            'start_date' => 'required',
            'end_date' => 'required',
            'monthly_rent' => 'required',
            'status' => 'required|in:ACTIVE,COMPLETED,TERMINATED',
            'property_id' => 'required|exists:properties,id',
            'tenant_id' => 'required|exists:users,id',
        ];
    }
}
