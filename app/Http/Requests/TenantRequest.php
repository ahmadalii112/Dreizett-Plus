<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_id' => ['required', 'exists:rooms,id'],
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
            'authorized_representative.phone_number' => ['nullable', 'string', 'max:255'],
            'authorized_representative.mobile_number' => ['nullable', 'string', 'max:255'],
            'authorized_representative.email' => ['nullable', 'email', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
