<?php

namespace App\Http\Requests;

use App\Enums\TicketStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TicketNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'note' => ['required', 'max:300'],
            'status' => ['sometimes', new Enum(TicketStatusEnum::class)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
