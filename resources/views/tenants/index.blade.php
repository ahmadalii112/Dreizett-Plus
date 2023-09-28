<x-app-layout>
    <x-slot name="heading">
            {{ __('Tenants') }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => 'Home'],
            ['url' => route('tenants.index'), 'label' => __('Tenants')],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900"> {{ __('Tenants') }}</h1>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ route('tenants.create') }}"
                                        class="block rounded-md {{ $rooms ? 'bg-gray-300 ' : 'bg-indigo-600' }} px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ __('Add Tenant') }}
                                </a>
                            </div>
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                {{ __('Name') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ __('Address') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ __('Room') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ __('Contract Start Date') }}
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                {{ __('Actions') }}
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                        @forelse($tenants as  $key => $tenant)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $tenant?->full_name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($tenant?->address, 30) ?? 'N/A'}}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $tenant?->room?->room_number ?? 'N/A' }}</td>
{{--                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $tenant?->contract_start_date ?? 'N/A'}}</td>--}}
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <div class="text-gray-900">Start: <span class="text-gray-500">{{ $tenant?->contract_start ?? 'N/A'}}</span></div>
                                                    <div class="mt-1 text-gray-900">End: <span class="text-gray-500">{{ $tenant?->contract_end ?? 'N/A'}}</span></div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <x-action-dropdown label="Options" >
                                                        <!-- Your menu items here -->
                                                        <div class="py-1" role="none">
                                                            <a href="{{ route('tenants.show', $tenant->id) }}" class="text-gray-700 hover:bg-gray-100 sm group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" g class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                                </svg>
                                                                Show
                                                            </a>
                                                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="text-gray-700 hover:bg-gray-100  group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">
                                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                                                </svg>
                                                                Edit
                                                            </a>
                                                            <div x-data="{ isModalOpen: false }" x-cloak>
                                                                <!-- Delete Tenant Button -->
                                                                <a @click="isModalOpen = true" class="block text-gray-700 hover:bg-gray-100 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">
                                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    Delete
                                                                </a>
                                                                <!-- Delete Tenant Modal -->
                                                                <x-delete-modal
                                                                    :is-open="'isModalOpen'"
                                                                    :close-action="'isModalOpen = false'"
                                                                    :modal-id="'modal'"
                                                                    :form-action="route('tenants.destroy', $tenant->id)"
                                                                    :form-method="'POST'"
                                                                    :form-method-type="'DELETE'"
                                                                    :modal-title="'Delete Tenant'"
                                                                    :modal-text="$tenant->full_name"
                                                                    :submit-text="'Delete'"
                                                                    :cancel-text="'Cancel'"
                                                                />
                                                            </div>
                                                        </div>
                                                    </x-action-dropdown>


                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5"
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-2xl font-medium text-center text-gray-900 sm:pl-0">
                                                    No Record Found
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                {{ $tenants->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
