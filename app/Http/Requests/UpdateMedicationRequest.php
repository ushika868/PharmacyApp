<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicationRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'description' => 'nullable|string',
            'quantity' => 'integer|min:0',
            'unit_price' => 'numeric|min:0',
            'expiry_date' => 'date|after_or_equal:today',
            'category' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'batch_number' => 'nullable|string',
        ];
    }
}
