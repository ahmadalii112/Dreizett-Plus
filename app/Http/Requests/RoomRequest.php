<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'apartment_id' => ['required', 'exists:shared_apartments,id'],
            'room_number' => ['required', 'string', 'max:255'],
            'square_meter_room' => ['required', 'numeric'],
            'square_meter_common_area' => ['required', 'numeric'],
            'basic_rent' => ['required', 'numeric'],
            'additional_costs' => ['required', 'numeric'],
            'heating_costs' => ['required', 'numeric'],
            'electricity_costs' => ['required', 'numeric'],
        ];
    }
}
