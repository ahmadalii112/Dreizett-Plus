<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentialCommunityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'care_allowance' => 'required|numeric|between:0,999999',
            'household_allowance' => 'required|numeric|between:0,999999',
            'deduction_amount_care_level_1' => 'required|numeric|between:0,999999',
            'deduction_amount_care_level_2' => 'required|numeric|between:0,999999',
            'deduction_amount_care_level_3' => 'required|numeric|between:0,999999',
            'deduction_amount_care_level_4' => 'required|numeric|between:0,999999',
            'deduction_amount_care_level_5' => 'required|numeric|between:0,999999',
        ];
    }
}
