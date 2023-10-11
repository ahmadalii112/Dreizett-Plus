<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_id' => ['required', 'exists:rooms,id'],
            'status' => 'nullable',
            'salutation' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'level_of_care' => ['required', 'integer', 'max:255'],
            'contract_start_date' => ['required', 'date'],
            'contract_end_date' => ['nullable', 'date'],
            // Authorized Representative
            'authorized_representative.phone_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:255'],
            'authorized_representative.mobile_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:255'],
            'authorized_representative.email' => ['nullable', 'email', 'max:255'],
            'authorized_representative.salutation' => ['nullable', 'string', 'max:255'],
            'authorized_representative.first_name' => ['nullable', 'string', 'max:255'],
            'authorized_representative.last_name' => ['nullable', 'string', 'max:255'],
            'authorized_representative.street' => ['nullable', 'string', 'max:255'],
            'authorized_representative.house_number' => ['nullable', 'string', 'max:255'],
            'authorized_representative.zip_code' => ['nullable', 'string', 'max:255'],
            'authorized_representative.city' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'authorized_representative.phone_number.regex' => trans('validation.regex', ['attribute' => 'phone number']),
            'authorized_representative.mobile_number.regex' => trans('validation.regex', ['attribute' => 'mobile number']),
            'authorized_representative.mobile_number.email' => trans('validation.regex', ['attribute' => 'email']),
        ];
    }
}
