<x-app-layout>
    <x-slot name="heading">
        {{ __(isset($sharedApartment)
        ? trans("language.actions.edit", ['action' => trans_choice("language.shared_apartments.apartments|apartment", 2)])
        : trans("language.actions.add", ['action' => trans_choice("language.shared_apartments.apartments|apartment", 2)])) }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('shared-apartments.index'), 'label' => trans_choice('language.shared_apartments.apartments|apartment', 1)],
            ['url' =>  isset($sharedApartment)
                ? route('shared-apartments.edit', $sharedApartment->id)
                : route('shared-apartments.create'),
             'label' => isset($sharedApartment)
                ? trans('language.actions.edit', ['action' => trans_choice('language.shared_apartments.apartments|apartment', 2)])
                : trans('language.actions.add', ['action' => trans_choice('language.shared_apartments.apartments|apartment', 2)])
                ],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($sharedApartment) ? route('shared-apartments.update', $sharedApartment->id) : route('shared-apartments.store') }}" class="from-prevent-multiple-submits">
                        @isset($sharedApartment) @method('PUT')@endisset
                        @csrf
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class=" grid grid-cols-2 gap-x-3 gap-y-8 sm:grid-cols-3">

                                <div class="sm:col-span-3">
                                    <label for="community_id" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans_choice("language.residential_community.communities|community", 2) }}</label>
                                    <div class="mt-2">
                                        <select id="community_id" name="community_id" autocomplete="community_id" class="block @error('community_id') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option>{{ trans('language.actions.select', ['name' => trans_choice("language.residential_community.communities|community", 2)]) }}</option>
                                            @foreach($residentialCommunities as $community)
                                                <option value="{{$community->id}}"
                                                        @if (old('community_id') == $community->id) selected="selected"
                                                        @elseif(isset($sharedApartment) && $errors->isEmpty())
                                                            @if($community->id == $sharedApartment->community_id)
                                                                selected
                                                    @endif
                                                    @endif
                                                >{{$community->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('community_id')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900 required"> {{ __('Name') }}</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name"  value="{{ old('name', isset($sharedApartment) ? $sharedApartment?->name : '') }}" autocomplete="family-name" class="block w-full @error('name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('name')
                                    <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('shared-apartments.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{ trans('language.actions.cancel', ['name' => null]) }}</a>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 from-prevent-multiple-submits">{{ trans('language.actions.save', ['name' => null]) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
