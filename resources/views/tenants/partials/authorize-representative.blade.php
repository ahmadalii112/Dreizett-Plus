<div class="mt-6 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900"> {{ trans('language.authorized_representative') }}</h2>
    <p class="mt-1 text-sm leading-6 text-gray-600">{{  trans('language.authorized_representative_information') }}.</p>
</div>
<div class="border-b border-gray-900/10 pb-12">
    <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="authorized_representative.salutation"
                   class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.tenants.salutation') }}</label>
            <div class="mt-2">
                <input type="text" name="authorized_representative[salutation]"
                       id="authorized_representative.salutation"
                       value="{{ old('authorized_representative.salutation', isset($tenant) ? $tenant->information->salutation : '') }}"
                       autocomplete="given-name"
                       class="block w-full @error('authorized_representative.salutation') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.salutation')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="sm:col-span-3">
            <label for="authorized_representative.first_name"
                   class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.first_name')  }}</label>
            <div class="mt-2">
                <input type="text" name="authorized_representative[first_name]"
                       id="authorized_representative.first_name"
                       value="{{ old('authorized_representative.first_name', isset($tenant) ? $tenant?->authorizedRepresentative?->information?->first_name : '') }}"
                       autocomplete="family-name"
                       class="block w-full @error('authorized_representative.first_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.first_name')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="sm:col-span-3">
            <label for="authorized_representative.last_name"
                   class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.last_name') }}</label>
            <div class="mt-2">
                <input type="text" name="authorized_representative[last_name]" id="authorized_representative.last_name"
                       value="{{ old('authorized_representative.last_name', isset($tenant) ? $tenant?->authorizedRepresentative?->information?->last_name : '') }}"
                       autocomplete="family-name"
                       class="block w-full @error('authorized_representative.last_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.last_name')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.house_number"
                   class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.tenants.house_number') }}</label>
            <div class="mt-2">
                <input id="authorized_representative.house_number" name="authorized_representative[house_number]"
                       type="text" autocomplete="authorized_representative.house_number"
                       value="{{ old('authorized_representative.house_number', isset($tenant) ? $tenant?->authorizedRepresentative?->information?->house_number : '') }}"
                       class="block w-full @error('authorized_representative.house_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.house_number')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.street"
                   class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.street') }}</label>
            <div class="mt-2">
                <input id="authorized_representative.street" name="authorized_representative[street]" type="text"
                       autocomplete="authorized_representative.street"
                       value="{{ old('authorized_representative.street', isset($tenant) ? $tenant->information?->street : '') }}"
                       class="block w-full @error('authorized_representative.street') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.street')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.zip_code"
                   class="block text-sm font-medium leading-6 text-gray-900"> {{  trans('language.zip_code')  }}</label>
            <div class="mt-2">
                <input id="authorized_representative.zip_code" name="authorized_representative[zip_code]" type="text"
                       autocomplete="authorized_representative.zip_code"
                       value="{{ old('authorized_representative.zip_code', isset($tenant) ? $tenant?->authorizedRepresentative?->information->zip_code : '') }}"
                       class="block w-full @error('authorized_representative.zip_code') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.zip_code')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.city"
                   class="block text-sm font-medium leading-6 text-gray-900"> {{ trans('language.city') }}</label>
            <div class="mt-2">
                <input id="authorized_representative.city" name="authorized_representative[city]" type="text"
                       autocomplete="authorized_representative.city"
                       value="{{ old('authorized_representative.city', isset($tenant) ? $tenant?->authorizedRepresentative?->information->city : '') }}"
                       class="block w-full @error('authorized_representative.city') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.city')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="sm:col-span-3">
            <label for="authorized_representative.phone_number"
                   class="block text-sm font-medium leading-6 text-gray-900">{{  trans('language.phone_number') }}</label>
            <div class="mt-2">
                <input type="text" name="authorized_representative[phone_number]"
                       id="authorized_representative.phone_number"
                       value="{{ old('authorized_representative.phone_number', isset($tenant) ? $tenant?->authorizedRepresentative?->phone_number : '') }}"
                       autocomplete="given-name"
                       class="block w-full @error('authorized_representative.phone_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.phone_number')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.mobile_number"
                   class="block text-sm font-medium leading-6 text-gray-900">{{  trans('language.mobile_number') }}</label>
            <div class="mt-2">
                <input type="text" name="authorized_representative[mobile_number]"
                       id="authorized_representative.mobile_number"
                       value="{{ old('authorized_representative.mobile_number', isset($tenant) ? $tenant?->authorizedRepresentative?->mobile_number : '') }}"
                       autocomplete="given-name"
                       class="block w-full @error('authorized_representative.mobile_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.mobile_number')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="authorized_representative.email"
                   class="block text-sm font-medium leading-6 text-gray-900">{{  trans('language.email') }}</label>
            <div class="mt-2">
                <input type="email" name="authorized_representative[email]" id="authorized_representative.email"
                       value="{{ old('authorized_representative.email', isset($tenant) ? $tenant?->authorizedRepresentative?->email : '') }}"
                       autocomplete="given-name"
                       class="block w-full @error('authorized_representative.email') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('authorized_representative.email')
            <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>