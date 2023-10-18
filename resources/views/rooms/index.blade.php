<x-app-layout>
    <x-slot name="heading">
        {{ trans_choice('language.rooms.rooms', 1) }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('rooms.index'), 'label' =>  trans_choice('language.rooms.rooms', 1)],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">{{ trans_choice("language.rooms.rooms", 1) }}
                                </h1>

                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ route('rooms.create') }}"
                                        class="block rounded-md {{ $residentialCommunities ? 'bg-gray-300 ' : 'bg-indigo-600' }} px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                     {{ trans('language.actions.add', ['action' =>  trans_choice('language.rooms.rooms', 2)]) }}
                                </a>
                            </div>
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8 pb-12">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="table data-table min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                {{ trans('language.rooms.room_number')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans_choice('language.residential_community.community', 1)  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.rooms.square_meter_room')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.rooms.square_meter_common_area')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.rooms.basic_rent')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.rooms.additional_costs')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ trans('language.rooms.heating_costs')  }}
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> {{ trans('language.rooms.electricity_costs')  }}
                                            </th>

                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ trans('language.actions.actions') }}
                                            </th>

                                        </tr>
                                        </thead>
                                        @include('rooms.partials.data-table')

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
