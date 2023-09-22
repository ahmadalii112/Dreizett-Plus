<?php

namespace App\Http\Requests;

use App\Enums\RoleTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'role' => ['required', new Enum(RoleTypeEnum::class)],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['sometimes', 'max:255'],
            'mobile_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:255'],
            'password' => [
                Rule::when($this->filled('password'), ['required', Password::min(8), 'max:255']),
            ],
            'email' => ['email', 'max:255', Rule::unique('users')->ignore($this->user)],
        ];
    }
}
