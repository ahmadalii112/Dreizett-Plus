<div class="p-6 text-gray-900">
    <div>
        <div class="px-4 sm:px-0">
            <div class="flex justify-between">
                <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ trans('language.tickets.ticket_notes') }}</h3>
                <div x-data="{ isModalOpen: @if($errors->any()) true @else false @endif }" x-cloak>
                    <button @click="isModalOpen = true"
                       class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                       role="menuitem" tabindex="-1" id="menu-item-1">
                        {{ trans('language.actions.add', ['action' => null]) }}
                    </button>
                    <!-- Add Note Modal -->
                    @include('tickets.partials.add-ticket-status-modal')
                </div>
{{--                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Note</button>--}}
            </div>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('All ticket notes with thier status') }}</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            @foreach($notes as $note)
                <dl class="grid grid-cols-1 sm:grid-cols-4">
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.name') }}</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->user?->full_name ?? 'N/A' }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.notes') }}</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->note ?? 'N/A' }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.tickets.ticket_status') }}</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">
                                        <span
                                            class="inline-flex items-center rounded-md bg-{{ $note->status_color }}-50 px-2 py-1 text-xs font-medium text-{{ $note->status_color }}-600 ring-1 ring-inset ring-{{ $note->status_color }}-500/10/20">{{ trans("enums.ticket_statuses.{$note?->status->value}")  ?? 'N/A' }} </span>
                        </dd>
                    </div>

                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.date') }}</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $note?->create_date ?? 'N/A' }}</dd>
                    </div>
                </dl>
            @endforeach

            {{ $notes->links() }}

        </div>
    </div>
</div>