<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 transform translate-y-1/2" @click.away="isModalOpen = false"
         @keydown.escape="isModalOpen = false"
         class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog"
         id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button @click="isModalOpen = false"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded hover:text-gray-700"
                    aria-label="close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <form method="POST" action="{{ route('tickets.add-note', $ticket) }}" class="from-prevent-multiple-submits">
            @csrf

            <!-- Email Address -->
            <div class="mt-5">
                <div class="mt-2">
                    <label for="status"
                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.status') }}</label>
                    <div class="mt-2">
                        <select id="status" name="status" autocomplete="status"
                                class="block @error('status') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option >Change Status</option>
                            <option
                                value="{{ \App\Enums\TicketStatusEnum::IN_PROGRESS->value }}" @selected(old('status', \App\Enums\TicketStatusEnum::IN_PROGRESS->value  ) == \App\Enums\TicketStatusEnum::IN_PROGRESS->value)>{{ trans('enums.ticket_statuses.'.\App\Enums\TicketStatusEnum::IN_PROGRESS->value)  }}</option>
                            <option
                                value="{{  \App\Enums\TicketStatusEnum::COMPLETED->value }}" @selected(old('status',   \App\Enums\TicketStatusEnum::COMPLETED->value ) == \App\Enums\TicketStatusEnum::COMPLETED->value) >{{   trans('enums.ticket_statuses.'.\App\Enums\TicketStatusEnum::COMPLETED->value) }}</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">
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

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" @click="isModalOpen = false" class="text-sm rounded-md font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</button>
                <button type="submit" class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('language.actions.save', ['name' => null]) }}</button>
            </div>
        </form>
    </div>
</div>
