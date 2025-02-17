<x-app-layout>
    <x-slot name="heading">
        {{ __(isset($user)
            ? trans('language.actions.edit', ['action' => trans_choice('language.users.users', 2)])
            : trans('language.actions.add', ['action' => trans_choice('language.users.users', 2)]))
        }}
    </x-slot>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['url' =>  route('dashboard'), 'label' => trans('language.home')],
            ['url' => route('users.index'), 'label' => trans_choice('language.users.users', 1)],
            ['url' =>  isset($user)
                    ? route('users.edit', $user->id)
                    : route('users.create'),
            'label' => isset($user)
                    ? trans('language.actions.edit', ['action' => trans_choice('language.users.users', 2)])
                    : trans('language.actions.add', ['action' => trans_choice('language.users.users', 2)])],
        ]"/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" class="from-prevent-multiple-submits">
                        @isset($user) @method('PUT')@endisset
                        @csrf
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="role" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.roles.role') }}</label>
                                <div class="mt-2">
                                    <select id="role" name="role" autocomplete="role-name" class="block @error('role') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option>{{ trans('language.actions.select', ['name' => trans('language.roles.role')]) }}</option>

                                        @foreach($roles as $role)
                                            <option value="{{$role}}"
                                                    @if (old('role') == $role) selected="selected"
                                                    @elseif(isset($user) && $errors->isEmpty())
                                                        @if($role == $user?->getRoleNames()?->first())
                                                            selected
                                                @endif
                                                @endif
                                            >
                                                {{  trans('enums.roles.'.$role) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('role')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.users.first_name') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="first_name" id="first_name"  value="{{ old('first_name', isset($user) ? $user?->first_name : '') }}" autocomplete="given-name" class="block w-full @error('first_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('first_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.users.last_name') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="last_name" id="last_name"  value="{{ old('last_name', isset($user) ? $user?->last_name : '') }}" autocomplete="family-name" class="block w-full @error('last_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('last_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="username" class="block text-sm font-medium leading-6 text-gray-900 required">{{ trans('language.username') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="username" id="username"  value="{{ old('username', isset($user) ? $user?->username : '') }}"  class="block w-full @error('username') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" autocomplete="off">
                                </div>
                                @error('username')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="mobile_number" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.users.mobile_number') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="mobile_number" id="mobile_number"  value="{{ old('mobile_number', isset($user) ? $user?->mobile_number : '') }}" autocomplete="family-name" class="block w-full @error('mobile_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('mobile_number')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.users.email') }}</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"  value="{{ old('email', isset($user) ? $user?->email : '') }}" class="block w-full @error('email') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('email')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.users.password') }}</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password"  value="{{ old('password') }}" autocomplete="password" class="block w-full @error("password") ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="{{ trans('language.users.password') }}">
                                </div>
                                @error('password')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('language.passwords.confirm_password') }}</label>
                                <div class="mt-2">
                                    <input type="password" name="password_confirmation" id="password_confirmation"  value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" class="block w-full @error("password_confirmation") ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                           placeholder="{{ trans('language.passwords.confirm_password') }}">
                                </div>
                                @error('password_confirmation')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('users.index') }}" class="text-sm font-semibold leading-6 text-gray-900"> {{ trans('language.actions.cancel', ['name' => null]) }}</a>
                        <button type="submit" class="from-prevent-multiple-submits rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ trans('language.actions.save', ['name' => null]) }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
