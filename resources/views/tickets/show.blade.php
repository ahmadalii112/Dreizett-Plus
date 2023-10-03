<x-app-layout>
    <x-slot name="heading">
        {{ __('Ticket Details') }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => 'Home'],
            ['url' => route('tickets.index'), 'label' => __('Tickets')],
            ['url' => route('tickets.show', $ticket->id), 'label' =>  __('Ticket Details')],
        ]"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <div class="flex justify-between">
                                <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ __('Ticket Details') }}</h3>
                                <a href="{{ route('tickets.export-pdf', $ticket->id)  }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                   Export PDF

                                </a>
                            </div>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('Information') }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="grid grid-cols-1 sm:grid-cols-3">
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('User Name') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->user?->full_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Location') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->location ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Message') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->message ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Salutation') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->ticket_type ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('House Number') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->dimensions ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Why is it needed?') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->why_needed ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Solution Suggestion') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->solution_suggestion ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Trade') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->trade ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Problem Location') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->problem_location ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Tried to Solve') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->tried_to_solve ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Proposed Solution') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->proposed_solution ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Expense Reason') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->expense_reason ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('User Note') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $ticket?->notes ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Ticket Status') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                                        <span
                                            class="inline-flex items-center rounded-md bg-{{ $ticket->ticket_status_color }}-50 px-2 py-1 text-xs font-medium text-{{ $ticket->ticket_status_color }}-600 ring-1 ring-inset ring-{{ $ticket->ticket_status_color }}-500/10/20">{{ $ticket?->ticket_status ?? 'N/A' }} </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <!-- Add Ticket notes -->
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ __('Add Ticket Notes') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('tickets.add-note', $ticket) }}" class="from-prevent-multiple-submits">
                                @csrf
                            <div class="mt-6  border-gray-100">
                                @csrf
                                <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <!-- Note -->
                                    <div class="sm:col-span-3">
                                        <label for="note"
                                               class="block text-sm font-medium leading-6 text-gray-900 required">{{ __("Note") }}</label>
                                        <div class="mt-2">
                                            <textarea id="note" name="note" rows="3"
                                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old("note") }}</textarea>
                                        </div>
                                        @error('note')
                                        <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Ticket Status -->
                                    <div class="sm:col-span-3">
                                        <label for="status"
                                               class="block text-sm font-medium leading-6 text-gray-900 required">{{__('Status')}}</label>
                                        <div class="mt-2">
                                            <select id="status" name="status" autocomplete="status"
                                                    class="block @error('status') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <option>Change Status</option>
                                                <option
                                                    value="{{ \App\Enums\TicketStatusEnum::IN_PROGRESS->value }}">{{  \App\Enums\TicketStatusEnum::IN_PROGRESS->value }}</option>
                                                <option
                                                    value="{{  \App\Enums\TicketStatusEnum::COMPLETED->value }}">{{  \App\Enums\TicketStatusEnum::COMPLETED->value }}</option>
                                            </select>
                                        </div>
                                        @error('status')
                                        <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                            class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Display Ticket notes -->
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ __('Ticket Notes') }}</h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('All ticket notes with thier status') }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            @foreach($notes as $note)
                            <dl class="grid grid-cols-1 sm:grid-cols-4">
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('User Name') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->user?->full_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Notes') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->note ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Ticket Status') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                                        <span
                                            class="inline-flex items-center rounded-md bg-{{ $note->status_color }}-50 px-2 py-1 text-xs font-medium text-{{ $note->status_color }}-600 ring-1 ring-inset ring-{{ $note->status_color }}-500/10/20">{{ $note?->status ?? 'N/A' }} </span>
                                    </dd>
                                </div>

                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Date') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->create_date ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                            @endforeach

                            {{ $notes->links() }}

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
