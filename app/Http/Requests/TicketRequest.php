<?php

namespace App\Http\Requests;

use App\Enums\LocationTypeEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ticket_type' => ['required', new Enum(TicketTypeEnum::class)],
            'location' => ['required', new Enum(LocationTypeEnum::class)],
            'message' => 'required',
            'notes' => 'nullable',
            'dimensions' => 'nullable|integer',
            'why_needed' => ['required_if:ticket_type,'.TicketTypeEnum::ORDER_REQUEST->value],
            'solution_suggestion' => ['required_if:ticket_type,'.TicketTypeEnum::SUGGESTION->value],
            'trade' => ['required_if:ticket_type,'.TicketTypeEnum::REPORT->value, new Enum(TradeTypeEnum::class)],
            'problem_location' => ['required_if:ticket_type,'.TicketTypeEnum::REPORT->value],
            'tried_to_solve' => ['required_if:ticket_type,'.TicketTypeEnum::REPORT->value],
            'proposed_solution' => ['required_if:ticket_type,'.TicketTypeEnum::REPORT->value],
            'expense_reason' => ['required_if:ticket_type,'.TicketTypeEnum::REIMBURSEMENT->value],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
