<x-action-dropdown label="Options">
    <!-- Your menu items here -->
    <div class="py-1" role="none">
        <a href="{{ route('residential-communities.edit', $residentialCommunity->id) }}" class="text-gray-700 hover:bg-gray-100  group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
            </svg>
            {{ trans('language.actions.edit', ['action' => null]) }}
        </a>
        <div x-data="{ isModalOpen: false }" x-cloak>
            <!-- Delete User Button -->
            <a @click="isModalOpen = true" class="block text-gray-700 hover:bg-gray-100 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">
                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                </svg>
                {{ trans('language.actions.delete', ['action' => null]) }}
            </a>
            <!-- Delete  Modal -->
            <x-delete-modal
                :is-open="'isModalOpen'"
                :close-action="'isModalOpen = false'"
                :modal-id="'modal'"
                :form-action="route('residential-communities.destroy', $residentialCommunity->id)"
                :form-method="'POST'"
                :form-method-type="'DELETE'"
                :modal-title="trans('language.actions.delete', ['action' => trans_choice('language.residential_community.community', 2)])"
                :modal-text="$residentialCommunity->name"
                :submit-text="trans('language.actions.delete', ['action' => null])"
                :cancel-text="trans('language.actions.cancel', ['name' => null])"
            />
        </div>
    </div>
</x-action-dropdown>