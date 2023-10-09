<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ trans('language.actions.delete_account') }}

        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ trans('language.actions.delete_account_message') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy', auth()->user()) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ trans('language.actions.message') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ trans('language.actions.delete_account_message') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{  trans('language.users.password') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ trans('language.actions.cancel', ['name'=> null]) }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ trans('language.actions.delete', ['action'=> null]) }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
