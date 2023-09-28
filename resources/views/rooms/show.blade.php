<x-app-layout>
    <x-slot name="heading">
        {{ __('Room Details') }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => 'Home'],
            ['url' => route('rooms.index'), 'label' => __('Rooms')],
            ['url' => route('rooms.show', $room->id), 'label' =>  __('Room Details')],
        ]"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ __('Room Details') }}</h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('Information') }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="grid grid-cols-1 sm:grid-cols-3">
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Apartment') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->apartment?->name }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Room Number') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->room_number }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Room (Square Meter)') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->square_meter_room }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ __('Common Area (Square Meter)') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->square_meter_common_area }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Basic Rent') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->basic_rent }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Additional Costs') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->additional_costs }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ __('Heating Costs') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->heating_costs }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Electricity Costs') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $room?->electricity_costs }}</dd>
                                </div>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
