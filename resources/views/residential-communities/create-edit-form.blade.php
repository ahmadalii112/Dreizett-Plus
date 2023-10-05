<x-app-layout>
    <x-slot name="heading">
        {{ __(isset($residentialCommunity)
            ? trans('language.actions.edit', ['action' => trans_choice('language.residential_community.community', 2)])
            : trans('language.actions.add', ['action' => trans_choice('language.residential_community.community', 2)]))
        }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('residential-communities.index'), 'label' =>  trans_choice('language.residential_community.community', 1) ],
            ['url' =>  isset($residentialCommunity)
                    ? route('residential-communities.edit', $residentialCommunity->id)
                    : route('residential-communities.create'),
            'label' => isset($residentialCommunity)
                    ? trans('language.actions.edit', ['action' => trans_choice('language.residential_community.community', 2)])
                    : trans('language.actions.add', ['action' => trans_choice('language.residential_community.community', 2)])],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post"
                          action="{{ isset($residentialCommunity) ? route('residential-communities.update', $residentialCommunity->id) : route('residential-communities.store') }}"
                          class="from-prevent-multiple-submits">
                        @isset($residentialCommunity)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.residential_community.name') }}</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name"
                                               value="{{ old('name', isset($residentialCommunity) ? $residentialCommunity?->name : '') }}"
                                               autocomplete="given-name"
                                               class="block w-full @error('name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('name')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="care_allowance"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.residential_community.care_allowance') }} (&euro;)</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="number" step="0.01" name="care_allowance" id="care_allowance"
                                               value="{{ old('care_allowance', isset($residentialCommunity) ? $residentialCommunity?->care_allowance : '') }}"
                                               autocomplete="care_allowance"
                                               class="block w-full @error('care_allowance') ring-red-300 @enderror  rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               placeholder="0.00">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                            <span class="text-gray-500 sm:text-sm" id="care_allowance">EUR</span>
                                        </div>
                                    </div>
                                    @error('care_allowance')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="household_allowance"
                                           class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.residential_community.household_allowance') }} (&euro;)</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="number" step="0.01" name="household_allowance"
                                               id="household_allowance"
                                               value="{{ old('household_allowance', isset($residentialCommunity) ? $residentialCommunity?->household_allowance : '') }}"
                                               autocomplete="household_allowance"
                                               class="block w-full @error('household_allowance') ring-red-300 @enderror  rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               placeholder="0.00">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                            <span class="text-gray-500 sm:text-sm" id="household_allowance">EUR</span>
                                        </div>
                                    </div>
                                    @error('household_allowance')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="sm:col-span-3">
                                    <label for="deduction_amount"
                                           class="block text-sm font-medium leading-6 text-gray-900 required"> {{ trans('language.residential_community.deduction_amount') }} (&euro;)</label>
                                    <div class="mt-2">
                                        <input type="number" name="deduction_amount" id="deduction_amount"
                                               value="{{ old('deduction_amount', isset($residentialCommunity) ? $residentialCommunity?->deduction_amount : '') }}"
                                               autocomplete="family-name"
                                               class="block w-full @error('deduction_amount') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               placeholder="1">
                                    </div>
                                    @error('deduction_amount')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('residential-communities.index') }}"
                               class="text-sm font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</a>
                            <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 from-prevent-multiple-submits">
                                {{ trans('language.actions.save', ['name' => null]) }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
