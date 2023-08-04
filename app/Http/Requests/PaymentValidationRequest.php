<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentValidationRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'name_on_card' => 'required|string|max:255',
            'card_number' => 'required|string|size:16',
            'cvc' => 'required|string|max:3',
            'expiry_month' => 'required|string|max:2',
            'expiry_year' => 'required|string|max:4',
        ];
    }
}
