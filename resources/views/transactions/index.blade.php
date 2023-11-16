<x-app-layout>
    <x-slot name="heading">
        {{ trans('language.transactions') }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('transactions.index'), 'label' => trans('language.transactions')],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">{{ trans('language.transactions') }}
                                </h1>
                            </div>

                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8 pb-12">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="table data-table min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.finApi.transactions.payment_partner_name') }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.finApi.transactions.reference_purpose') }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.finApi.transactions.details') }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.finApi.transactions.transaction_date') }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans_choice('language.tenants.tenants', 1) }}
                                            </th>
                                        </tr>
                                        </thead>
                                        @include('transactions.partials.data-table')

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
