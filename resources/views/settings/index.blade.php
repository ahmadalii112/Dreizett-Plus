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
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex justify-center p-4 shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                            <form action="{{ route('finapi-createBankConnection') }}" method="post" class="mt-6 space-y-6" target="_blank">
                                @csrf
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ trans('language.finApi.open_form') }}</x-primary-button>
                                </div>
                            </form>
                    </section>
                </div>

            </div>
        </div>
        @if(session('webFormId'))
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8 space-y-6 mt-5">
            <div class="flex justify-center p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                            <form action="{{ route('finapi-web-form-status', session('webFormId')) }}" method="get" class="mt-6 space-y-6" >
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ trans('language.finApi.check_status') }}</x-primary-button>
                                </div>
                            </form>
                    </section>
                </div>

            </div>
        </div>
        @endif
    </div>
</x-app-layout>
