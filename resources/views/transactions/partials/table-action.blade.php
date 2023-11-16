    <div x-data="{ isModalOpen: false }" x-cloak class="cursor-pointer">
        <!-- Assign Tenant -->

        <a @click="isModalOpen = true"
           class="btn btn-outline-primary btn-sm"
           role="menuitem" tabindex="-1" id="menu-item-1">
            {{ trans('language.actions.assign', ['action' => null]) }}
        </a>


        <!-- Assign Tenant Modal -->
        @include('transactions.partials.assign-tenant-modal')
    </div>
