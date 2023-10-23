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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ trans('language.settings')  }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
