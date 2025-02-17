<x-app-layout>
    <x-slot name="heading">
        {{ isset($ticket)
                ? trans('language.actions.edit', ['action' => trans_choice('language.tickets.tickets', 2)])
                :  trans('language.actions.add', ['action' => trans_choice('language.tickets.tickets', 2)])
                 }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('tickets.index'), 'label' => __('Tickets')],
            ['url' =>  isset($ticket) ? route('tickets.edit', $ticket->id) : route('tickets.create'),
             'label' => isset($ticket)
                    ? trans('language.actions.edit', ['action' => trans_choice('language.tickets.tickets', 2)])
                    : trans('language.actions.add', ['action' => trans_choice('language.tickets.tickets', 2)])],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post"
                          action="{{ isset($ticket) ? route('tickets.update', $ticket->id) : route('tickets.store') }}"
                          class="from-prevent-multiple-submits">
                        @isset($ticket)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900"> {{ trans_choice('language.tickets.tickets', 1) }}</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">{{ trans('language.tickets.tickets_information') }}.</p>
                        </div>
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                 x-data="{ ticketSelectedOption: '{{ old('ticket_type', isset($ticket) ? $ticket->ticket_type : '' )}}' }" x->
                                <div class="sm:col-span-3">
                                    <label for="location"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.location') }}</label>
                                    <div class="mt-2">
                                        <select id="location" name="location" autocomplete="location"
                                                class="block @error('location') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option>{{ trans('language.actions.select', ['name' =>  trans('language.tickets.location') ]) }}</option>
                                            @foreach(\App\Enums\LocationTypeEnum::cases() as $location)
                                                <option value="{{$location->value}}"
                                                        @if ((old('location') == $location->value) || (isset($ticket) && $ticket->location->value == $location->value && $errors->isEmpty()))
                                                            selected="selected"
                                                    @endif
                                                >
                                                    {{  trans('enums.location_type.'.$location?->value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('location')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="ticket_type"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{  trans('language.tickets.ticket_type')  }}</label>
                                    <div class="mt-2">
                                        <select x-model="ticketSelectedOption" id="ticket_type" name="ticket_type"
                                                autocomplete="ticket_type"
                                                class="block @error('ticket_type') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option>{{  trans('language.actions.select', ['name' =>  trans('language.tickets.ticket_type') ]) }}</option>
                                            @foreach(\App\Enums\TicketTypeEnum::cases() as $ticket_type)
                                                <option value="{{$ticket_type->value}}"
                                                        @if ((old('ticket_type') == $ticket_type->value) || (isset($ticket) && $ticket->ticket_type->value == $ticket_type->value && $errors->isEmpty()))
                                                            selected="selected"
                                                    @endif
                                                >
                                                    {{  trans('enums.ticket_type.'.$ticket_type?->value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('ticket_type')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="message"
                                           class="block text-sm font-medium leading-6 text-gray-900 ">{{ trans('language.tickets.message')}}</label>
                                    <div class="mt-2">
                                        <textarea id="message" name="message" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("message", isset($ticket) ? $ticket->message :  "") }}</textarea>

                                    </div>
                                    @error('message')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="dimensions"
                                           class="block text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.dimensions') }}</label>
                                    <div class="mt-2">
                                        <input type="number" name="dimensions" id="dimensions"
                                               value="{{ old('dimensions', isset($ticket) ? $ticket?->dimensions : '') }}"
                                               autocomplete="given-name"
                                               class="block w-full @error('dimensions') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('dimensions')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Why Needed (required for 'Order Request') -->
                                <div class="col-span-full"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::ORDER_REQUEST->value }}'">
                                    <label for="why_needed"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.why_needed')}}</label>
                                    <div class="mt-2">
                                        <textarea id="why_needed" name="why_needed" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("why_needed", isset($ticket) ? $ticket->why_needed :  "") }}</textarea>
                                    </div>
                                    @error('why_needed')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Solution Suggestion (required for 'Suggestion for Improvement') -->
                                <div class="col-span-full"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::SUGGESTION->value }}'"
                                >
                                    <label for="solution_suggestion"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{  trans('language.tickets.solution_suggestion') }}</label>
                                    <div class="mt-2">
                                        <textarea id="solution_suggestion" name="solution_suggestion" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("solution_suggestion", isset($ticket) ? $ticket->solution_suggestion :  "") }}</textarea>
                                    </div>
                                    @error('solution_suggestion')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <label for="trade"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.trade') }} </label>
                                    <div class="mt-2">
                                        <select id="trade" name="trade" autocomplete="trade"
                                                class="block @error('trade') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option>{{ trans('language.actions.select', ['name' => trans('language.tickets.trade') ]) }} </option>
                                            @foreach(\App\Enums\TradeTypeEnum::cases() as $trade)
                                                <option value="{{$trade?->value}}"
                                                        @if ((old('trade') == $trade?->value) || (isset($ticket) && $ticket?->trade?->value == $trade?->value && $errors?->isEmpty()))
                                                            selected="selected"
                                                    @endif
                                                >
                                                    {{ trans('enums.trade_type.'.$trade->value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('trade')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Problem Location (mandatory for 'Report a Technical Malfunction') -->
                                <div class="sm:col-span-3"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <label for="problem_location"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.problem_location') }} </label>
                                    <div class="mt-2">
                                        <textarea id="problem_location" name="problem_location" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("problem_location", isset($ticket) ? $ticket->problem_location :  "") }}</textarea>
                                    </div>
                                    @error('problem_location')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Tried to Solve (mandatory for 'Report a Technical Malfunction') -->
                                <div class="sm:col-span-3"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <label for="tried_to_solve"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.tried_to_solve') }} </label>
                                    <div class="mt-2">
                                        <textarea id="tried_to_solve" name="tried_to_solve" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("tried_to_solve", isset($ticket) ? $ticket->tried_to_solve :  "") }}</textarea>
                                    </div>
                                    @error('tried_to_solve')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Proposed Solution (mandatory for 'Report a Technical Malfunction') -->
                                <div class="sm:col-span-3"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <label for="proposed_solution"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.proposed_solution') }} </label>
                                    <div class="mt-2">
                                        <textarea id="proposed_solution" name="proposed_solution" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("proposed_solution", isset($ticket) ? $ticket->proposed_solution :  "") }}</textarea>
                                    </div>
                                    @error('proposed_solution')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Expense Reason (required for 'Reimbursement of Expenses') -->
                                <div class="col-span-full"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REIMBURSEMENT->value }}'"
                                >
                                    <label for="expense_reason"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tickets.expense_reason') }}</label>
                                    <div class="mt-2">
                                        <textarea id="expense_reason" name="expense_reason" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("expense_reason", isset($ticket) ? $ticket->expense_reason :  "") }}</textarea>
                                    </div>
                                    @error('expense_reason')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-full">
                                    <label for="notes"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{  trans('language.tickets.notes')  }}</label>
                                    <div class="mt-2">
                                        <textarea id="notes" name="notes" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("notes", isset($ticket) ? $ticket->notes :  "") }}</textarea>
                                    </div>
                                    @error('notes')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('tickets.index') }}"
                               class="text-sm font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</a>
                            <button type="submit"
                                    class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('language.actions.save', ['name' => null]) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
