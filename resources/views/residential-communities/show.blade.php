<x-app-layout>
    <x-slot name="heading">
        {{ trans('language.actions.details', ['name' => trans_choice('language.residential_community.community', 2)]) }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('residential-communities.index'), 'label' => trans_choice('language.residential_community.community', 1)],
            ['url' => route('residential-communities.show', $residentialCommunity->id), 'label' =>  trans('language.actions.details', ['name' => trans_choice('language.residential_community.community', 2)])],
        ]"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900"> {{trans('language.actions.details', ['name' => trans_choice('language.residential_community.community', 2)]) }}</h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"> {{ __('Information') }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="grid grid-cols-1 sm:grid-cols-3">
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans_choice("language.rooms.rooms", 1) }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->rooms()->count() }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.care_allowance') }}
                                        (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->care_allowance ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ trans('language.residential_community.household_allowance') }}
                                        (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->household_allowance ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.deduction_amount_care_level', ['level' => 1]) }} (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->deduction_amount_care_level_1 ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.deduction_amount_care_level', ['level' => 2]) }} (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->deduction_amount_care_level_2 ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.deduction_amount_care_level', ['level' => 3]) }} (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->deduction_amount_care_level_3 ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.deduction_amount_care_level', ['level' => 4]) }} (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->deduction_amount_care_level_4 ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{ trans('language.residential_community.deduction_amount_care_level', ['level' => 5]) }} (&euro;)</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->deduction_amount_care_level_5 ?? 'N/A' }}</dd>
                                </div>
                                <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> {{  trans('language.users.created_by') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $residentialCommunity?->user->full_name ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
