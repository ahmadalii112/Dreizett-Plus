<x-app-layout>
    <x-slot name="heading">
           @if(request()->routeIs('tenants.index'))  {{ trans_choice('language.tenants.tenants', 1) }} @else {{ trans_choice('language.tenants.previous_status', 1) }} @endif
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => request()->routeIs('tenants.index')
                        ? route('tenants.index')
                        : route('previous-tenants', $roomId),
             'label' => request()->routeIs('tenants.index')
                        ?  trans_choice('language.tenants.tenants', 1)
                        :  trans_choice('language.tenants.previous_status', 1)],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">@if(request()->routeIs('tenants.index'))  {{ trans_choice('language.tenants.tenants', 1) }} @else {{  trans_choice('language.tenants.previous_status', 1) }} @endif</h1>
                            </div>
                            @if(request()->routeIs('tenants.index'))
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <a href="{{ route('tenants.create') }}"
                                            class="block rounded-md {{ $rooms ? 'bg-gray-300 ' : 'bg-indigo-600' }} px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        {{ trans('language.actions.add', ['action' =>  trans_choice('language.tenants.tenants', 2)]) }}
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8 pb-12">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="table data-table min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.tenants.insurance_number') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.rooms.room_number') }}
                                            </th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                {{ trans('language.name') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.address') }}
                                            </th>

                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.status') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.tenants.contract_start_date') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.tenants.contract_end_date') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ trans('language.actions.actions') }}
                                            </th>

                                        </tr>
                                        </thead>
                                        @include('tenants.partials.data-table')
                                        {{--<tbody class="divide-y divide-gray-200">
                                        @forelse($tenants as  $key => $tenant)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $tenant?->information?->full_name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $tenant?->insurance_number ?? 'N/A' }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($tenant?->information?->address, 30) ?? 'N/A'}}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $tenant?->room?->room_number ?? 'N/A' }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <span class="inline-flex items-center rounded-md bg-{{ ($tenant->status == 1) ? 'green' : 'red'  }}-50 px-2 py-1 text-xs font-medium text-{{ ($tenant->status == 1) ? 'green' : 'red'  }}-600 ring-1 ring-inset ring-{{ ($tenant->status == 1) ? 'green' : 'red'  }}-500/10/20">
                                                     {{ $tenant?->tenant_status ?? 'N/A' }}
                                                     </span>
                                                </td>
--}}{{--                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $tenant?->contract_start_date ?? 'N/A'}}</td>--}}{{--
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <div class="text-gray-900">Start: <span class="text-gray-500">{{ $tenant?->contract_start ?? 'N/A'}}</span></div>
                                                    <div class="mt-1 text-gray-900">End: <span class="text-gray-500">{{ $tenant?->contract_end ?? 'N/A'}}</span></div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-2xl font-medium text-center text-gray-900 sm:pl-0">
                                                    {{ trans('language.no_record') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>--}}
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
