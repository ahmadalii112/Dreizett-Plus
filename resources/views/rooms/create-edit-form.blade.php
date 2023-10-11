<x-app-layout>
    <x-slot name="heading">
        {{ __(isset($room)
            ? trans('language.actions.edit', ['action' => trans_choice('language.rooms.rooms', 2)])
            : trans('language.actions.add', ['action' => trans_choice('language.rooms.rooms', 2)]))
             }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($room) ? 'Edit Room' : 'Create Room') }}
        </h2>
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('rooms.index'), 'label' =>  trans_choice('language.rooms.rooms', 1)],
            ['url' =>  isset($room)
                        ? route('rooms.edit', $room->id)
                        : route('rooms.create'),
             'label' => isset($room)
                        ? trans('language.actions.edit', ['action' => trans_choice('language.rooms.rooms', 2)])
                        : trans('language.actions.add', ['action' => trans_choice('language.rooms.rooms', 2)])],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($room) ? route('rooms.update', $room->id) : route('rooms.store') }}" class="from-prevent-multiple-submits">
                        @isset($room) @method('PUT')@endisset
                        @csrf
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="community_id" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans_choice('language.residential_community.community', 1)}}</label>
                                <div class="mt-2">
                                    <select id="community_id" name="community_id" autocomplete="community_id" class="block @error('community_id') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option>{{ trans('language.actions.select', ['name' => trans_choice('language.residential_community.community', 2)]) }}</option>
                                        @foreach($residentialCommunities as $community)
                                            <option value="{{$community->id}}"
                                                    @if ((old('community_id') == $community->id) || (isset($room) && $room->community_id == $community->id && $errors->isEmpty()))
                                                        selected="selected"
                                                @endif
                                            >
                                                {{$community->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('community_id')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="room_number" class="block text-sm font-medium leading-6 text-gray-900 required"> {{ trans('language.rooms.room_number')  }}</label>
                                <div class="mt-2">
                                    <input type="text" name="room_number" id="room_number"  value="{{ old('room_number', isset($room) ? $room?->room_number : '') }}" autocomplete="given-name" class="block w-full @error('room_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('room_number')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="square_meter_room" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.rooms.square_meter_room')  }}</label>
                                <div class="mt-2">
                                    <input type="number" step="0.01" name="square_meter_room"   id="square_meter_room"  value="{{ old('square_meter_room', isset($room) ? $room?->square_meter_room : '') }}" autocomplete="family-name" class="block w-full @error('square_meter_room') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('square_meter_room')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="square_meter_common_area" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.rooms.square_meter_common_area')  }}</label>
                                <div class="mt-2">
                                    <input type="number" step="0.01" name="square_meter_common_area"   id="square_meter_common_area"  value="{{ old('square_meter_common_area', isset($room) ? $room?->square_meter_common_area : '') }}" autocomplete="family-name" class="block w-full @error('square_meter_common_area') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('square_meter_common_area')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="basic_rent" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.rooms.basic_rent')  }}</label>
                                <div class="mt-2">
                                    <input id="basic_rent" name="basic_rent"  type="number" step="0.01" autocomplete="basic_rent"  value="{{ old('basic_rent', isset($room) ? $room?->basic_rent : '') }}" class="block w-full @error('basic_rent') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('basic_rent')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="additional_costs" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.rooms.additional_costs')  }}</label>
                                <div class="mt-2">
                                    <input id="additional_costs" name="additional_costs"  type="number" step="0.01" autocomplete="additional_costs"  value="{{ old('additional_costs', isset($room) ? $room?->additional_costs : '') }}" class="block w-full @error('additional_costs') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('additional_costs')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="heating_costs" class="block text-sm font-medium leading-6 text-gray-900 required"> {{ trans('language.rooms.heating_costs')  }}</label>
                                <div class="mt-2">
                                    <input id="heating_costs" name="heating_costs"  type="number" step="0.01" autocomplete="heating_costs"  value="{{ old('heating_costs', isset($room) ? $room?->heating_costs : '') }}" class="block w-full @error('heating_costs') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('heating_costs')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="electricity_costs" class="block text-sm font-medium leading-6 text-gray-900 required"> {{ trans('language.rooms.electricity_costs')  }}</label>
                                <div class="mt-2">
                                    <input id="electricity_costs" name="electricity_costs"  type="number" step="0.01" autocomplete="electricity_costs"  value="{{ old('electricity_costs', isset($room) ? $room?->electricity_costs : '') }}" class="block w-full @error('electricity_costs') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('electricity_costs')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('rooms.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</a>
                        <button type="submit" class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('language.actions.save', ['name' => null]) }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
