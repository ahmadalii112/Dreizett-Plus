<x-app-layout>
    <x-slot name="heading">
        {{  trans('language.settings')  }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('settings.index'), 'label' => trans('language.settings') ],
        ]"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{trans('language.settings') }}
                            </h2>
                        </header>
                            <form action="{{ route('finapi-createBankConnection') }}" method="post" class="mt-6 space-y-6" target="_blank">
                                @csrf
                                {{--<div>
                                    <label class="block font-medium text-sm text-gray-700" for="username">Fin API Username</label>
                                    <input  id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="off" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="password">Fin API password</label>
                                    <input  id="password" name="password" type="password" value="" autocomplete="off" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                </div>
                                --}}
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('submit') }}</x-primary-button>
                                </div>
                            </form>
                    </section>
                </div>

            </div>
        </div>
        @if(session('webFormId'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Web Form Status
                            </h2>
                        </header>
                            <form action="{{ route('finapi-web-form-status', session('webFormId')) }}" method="get" class="mt-6 space-y-6" >
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Check Status') }}</x-primary-button>
                                </div>
                            </form>
                    </section>
                </div>

            </div>
        </div>
        @endif
    </div>
</x-app-layout>
