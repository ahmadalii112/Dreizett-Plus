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