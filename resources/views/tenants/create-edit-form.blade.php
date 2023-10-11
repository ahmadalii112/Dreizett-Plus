<x-app-layout>
    <x-slot name="heading">
        {{ isset($tenant)
                ? trans('language.actions.edit', ['action' => trans_choice('language.tenants.tenants', 2)])
                : trans('language.actions.add', ['action' => trans_choice('language.tenants.tenants', 2)])
                 }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('tenants.index'), 'label' => trans_choice('language.tenants.tenants', 1)],
            ['url' =>  isset($tenant)
                        ? route('tenants.edit', $tenant->id)
                        : route('tenants.create'),
             'label' => isset($tenant)
                    ? trans('language.actions.edit', ['action' => trans_choice('language.tenants.tenants', 2)])
                    : trans('language.actions.add', ['action' => trans_choice('language.tenants.tenants', 2)])],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($tenant) ? route('tenants.update', $tenant->id) : route('tenants.store') }}" class="from-prevent-multiple-submits">
                        @isset($tenant) @method('PUT')@endisset
                        @csrf
                    <div class="pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900"> {{ trans_choice('language.tenants.tenants', 2) }}</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ trans('language.tenants.tenant_information') }}</p>
                    </div>
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="room_id" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.rooms.room_number') }}</label>
                                <div class="mt-2">
                                    <select id="room_id" name="room_id" autocomplete="room_id" class="block @error('room_id') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option>{{ trans('language.actions.select', ['name' => trans_choice('language.rooms.rooms', 2) ]) }}</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}"
                                                    @if ((old('room_id') == $room->id) || (isset($tenant) && $tenant->room_id == $room->id && $errors->isEmpty()))
                                                        selected="selected"
                                                @endif
                                            >
                                                {{$room->room_number}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('room_id')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="salutation" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tenants.salutation') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="salutation" id="salutation"  value="{{ old('salutation', isset($tenant) ? $tenant?->information->salutation : '') }}" autocomplete="given-name" class="block w-full @error('salutation') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('salutation')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.first_name')  }}</label>
                                <div class="mt-2">
                                    <input type="text" name="first_name"   id="first_name"  value="{{ old('first_name', isset($tenant) ? $tenant?->information->first_name : '') }}" autocomplete="family-name" class="block w-full @error('first_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('first_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.last_name') }}</label>
                                <div class="mt-2">
                                    <input type="text"  name="last_name"   id="last_name"  value="{{ old('last_name', isset($tenant) ? $tenant?->information->last_name : '') }}" autocomplete="family-name" class="block w-full @error('last_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('last_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="house_number" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tenants.house_number') }}</label>
                                <div class="mt-2">
                                    <input id="house_number" name="house_number"  type="text"  autocomplete="house_number"  value="{{ old('house_number', isset($tenant) ? $tenant?->information->house_number : '') }}" class="block w-full @error('house_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('house_number')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="street" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.street') }}</label>
                                <div class="mt-2">
                                    <input id="street" name="street"  type="text"  autocomplete="street"  value="{{ old('street', isset($tenant) ? $tenant?->information->street : '') }}" class="block w-full @error('street') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('street')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900 required"> {{  trans('language.zip_code')  }}</label>
                                <div class="mt-2">
                                    <input id="zip_code" name="zip_code"  type="text"  autocomplete="zip_code"  value="{{ old('zip_code', isset($tenant) ? $tenant?->information->zip_code : '') }}" class="block w-full @error('zip_code') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('zip_code')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="city" class="block text-sm font-medium leading-6 text-gray-900 required"> {{ trans('language.city') }}</label>
                                <div class="mt-2">
                                    <input id="city" name="city"  type="text"  autocomplete="city"  value="{{ old('city', isset($tenant) ? $tenant?->information->city : '') }}" class="block w-full @error('city') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('city')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="level_of_care" class="block text-sm font-medium leading-6 text-gray-900 required"> {{  trans('language.tenants.level_of_care')  }}</label>
                                <div class="mt-2">
                                    <input id="level_of_care" name="level_of_care"  type="number"  autocomplete="level_of_care"  value="{{ old('level_of_care', isset($tenant) ? $tenant?->level_of_care : '') }}" class="block w-full @error('level_of_care') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('level_of_care')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="contract_start_date" class="block text-sm font-medium leading-6 text-gray-900 required"> {{  trans('language.tenants.contract_start_date')  }}</label>
                                <div class="mt-2">
                                    <input id="contract_start_date" name="contract_start_date"  type="date"  autocomplete="contract_start_date"  value="{{ old('contract_start_date', isset($tenant) ? \Carbon\Carbon::parse($tenant?->contract_start_date)->format('Y-m-d') : '') }}" class="block w-full @error('contract_start_date') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('contract_start_date')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="contract_end_date" class="block text-sm font-medium leading-6 text-gray-900"> {{  trans('language.tenants.contract_end_date')  }}</label>
                                <div class="mt-2">
                                    <input id="contract_end_date" name="contract_end_date"  type="date"  autocomplete="contract_end_date"  value="{{ old('contract_end_date', isset($tenant) ? \Carbon\Carbon::parse($tenant?->contract_end_date)->format('Y-m-d')  : '') }}" class="block w-full @error('contract_end_date') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('contract_end_date')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @unless(isset($tenant))
                            <input type="hidden" name="status" value="1" class="hidden" hidden>
                            @endunless
                        </div>
                    </div>
                    {{-- Authorized Represenative --}}
                    @include('tenants.partials.authorize-representative')

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('tenants.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</a>
                        <button type="submit" class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('language.actions.save', ['name' => null]) }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
