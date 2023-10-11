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
            'community_id' => ['required', 'exists:residential_communities,id'],
            'room_number' => ['required', 'string', 'max:255'],
            'square_meter_room' => ['required', 'numeric', 'between:0,9999'],
            'square_meter_common_area' => ['required', 'numeric', 'between:0,9999'],
            'basic_rent' => ['required', 'numeric', 'between:0,9999'],
            'additional_costs' => ['required', 'numeric', 'between:0,9999'],
            'heating_costs' => ['required', 'numeric', 'between:0,9999'],
            'electricity_costs' => ['required', 'numeric', 'between:0,9999'],
        ];
    }
}
