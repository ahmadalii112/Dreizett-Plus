<x-app-layout>
    <x-slot name="heading">
        {{ trans('language.actions.details', ['name' => trans_choice('language.tickets.tickets', 1)]) }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('tickets.index'), 'label' => __('Tickets')],
            ['url' => route('tickets.show', $ticket->id), 'label' =>  trans('language.actions.details', ['name' => trans_choice('language.tickets.tickets', 1)])],
        ]"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <div class="flex justify-between">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">  {{ trans('language.actions.details', ['name' => trans_choice('language.tickets.tickets', 1)]) }}</h3>
                                <a href="{{ route('tickets.export-pdf', $ticket->id)  }}"
                                   class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ trans('language.actions.export') }}

                                </a>
                            </div>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('Information') }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="grid grid-cols-1 sm:grid-cols-3"
                                x-cloak
                                x-data="{ ticketSelectedOption: '{{ $ticket->ticket_type }}' }"
                            >
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.name') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->user?->full_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.tickets.location') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ trans('enums.location_type.'.$ticket?->location?->value)  ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.message')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->message ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.ticket_type')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{  trans('enums.ticket_type.'. $ticket?->ticket_type?->value) ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.dimensions')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->dimensions ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::ORDER_REQUEST->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.why_needed')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->why_needed ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::SUGGESTION->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.solution_suggestion')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->solution_suggestion ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.trade')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{  trans('enums.trade_type.'.$ticket?->trade?->value)  ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.problem_location')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->problem_location ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.tried_to_solve')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->tried_to_solve ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REPORT->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.proposed_solution')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->proposed_solution ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0"
                                     x-show="ticketSelectedOption === '{{ \App\Enums\TicketTypeEnum::REIMBURSEMENT->value }}'"
                                >
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.expense_reason')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->expense_reason ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{  trans('language.tickets.notes')  }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->notes ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{   trans('language.tickets.ticket_status')   }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                                        <span
                                            class="inline-flex items-center rounded-md bg-{{ $ticket->ticket_status_color }}-50 px-2 py-1 text-xs font-medium text-{{ $ticket->ticket_status_color }}-600 ring-1 ring-inset ring-{{ $ticket->ticket_status_color }}-500/10/20">{{  trans("enums.ticket_statuses.{$ticket?->ticket_status->value}") ?? 'N/A' }} </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <!-- Add Ticket notes -->

                <!-- Display Ticket notes -->
                @include('tickets.partials.ticket-notes', $notes)


            </div>
        </div>
    </div>
</x-app-layout>
