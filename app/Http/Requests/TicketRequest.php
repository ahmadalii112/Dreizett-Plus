<?php

namespace App\Http\Requests;

use App\Enums\LocationTypeEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'dimensions' => ['nullable', 'numeric', 'between:0,9999'],
            'why_needed' => ['required_if:ticket_type,'.TicketTypeEnum::ORDER_REQUEST->value],
            'solution_suggestion' => ['required_if:ticket_type,'.TicketTypeEnum::SUGGESTION->value],
            //            'trade' => ['required_if:ticket_type,'.TicketTypeEnum::REPORT->value, new Enum(TradeTypeEnum::class)],
            'trade' => [
                Rule::when(request('ticket_type') == TicketTypeEnum::REPORT->value, [
                    'required',
                    new Enum(TradeTypeEnum::class),
                ]),
            ],
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

    protected function prepareForValidation()
    {
        if ($this->input('trade') == 'Select Trade') {
            $this->merge(['trade' => null]);
        }
        $ticketType = $this->input('ticket_type');
        $this->merge(
            match ($ticketType) {
                TicketTypeEnum::ORDER_REQUEST->value => ['solution_suggestion' => null, 'expense_reason' => null, 'trade' => null, 'problem_location' => null, 'tried_to_solve' => null, 'proposed_solution' => null],
                TicketTypeEnum::SUGGESTION->value => ['why_needed' => null, 'expense_reason' => null, 'trade' => null, 'problem_location' => null, 'tried_to_solve' => null, 'proposed_solution' => null],
                TicketTypeEnum::REIMBURSEMENT->value => ['solution_suggestion' => null, 'why_needed' => null, 'trade' => null, 'problem_location' => null, 'tried_to_solve' => null, 'proposed_solution' => null],
                TicketTypeEnum::REPORT->value => ['solution_suggestion' => null, 'why_needed' => null, 'expense_reason' => null],
                default => [],
            }
        );
        /*if ($this->input('ticket_type') == TicketTypeEnum::ORDER_REQUEST->value) {
            $this->merge([
                'solution_suggestion' => null,
                'expense_reason' => null,
                'trade' => null,
                'problem_location' => null,
                'tried_to_solve' => null,
                'proposed_solution' => null,
            ]);
        }
        if ($this->input('ticket_type') == TicketTypeEnum::SUGGESTION->value) {
            $this->merge([
                'why_needed' => null,
                'expense_reason' => null,
                'trade' => null,
                'problem_location' => null,
                'tried_to_solve' => null,
                'proposed_solution' => null,
            ]);
        }
        if ($this->input('ticket_type') == TicketTypeEnum::REIMBURSEMENT->value) {
            $this->merge([
                'solution_suggestion' => null,
                'why_needed' => null,
                'trade' => null,
                'problem_location' => null,
                'tried_to_solve' => null,
                'proposed_solution' => null,
            ]);
        }
        if ($this->input('ticket_type') == TicketTypeEnum::REPORT->value) {
            $this->merge([
                'solution_suggestion' => null,
                'why_needed' => null,
                'expense_reason' => null,
            ]);
        }*/

    }
}
