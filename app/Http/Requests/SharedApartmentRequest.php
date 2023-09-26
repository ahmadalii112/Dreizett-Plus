<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SharedApartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'community_id' => ['required', 'exists:residential_communities,id'],
            'name' => ['required', 'max:255'],
        ];
    }
}
