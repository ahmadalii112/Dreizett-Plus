<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($user) ? 'Edit User' : 'Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                        @isset($user) @method('PUT')@endisset
                        @csrf
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                                <div class="mt-2">
                                    <select id="role" name="role" autocomplete="role-name" class="block @error('role') ring-red-300 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option>Select Role</option>

                                        @foreach($roles as $role)
                                            <option value="{{$role}}"
                                                    @if (old('role') == $role) selected="selected"
                                                    @elseif(isset($user) && $errors->isEmpty())
                                                        @if($role == $user?->getRoleNames()?->first())
                                                            selected
                                                @endif
                                                @endif
                                            >{{$role}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('role')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                                <div class="mt-2">
                                    <input type="text" name="first_name" id="first_name"  value="{{ old('first_name', isset($user) ? $user?->first_name : '') }}" autocomplete="given-name" class="block w-full @error('first_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('first_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                                <div class="mt-2">
                                    <input type="text" name="last_name" id="last_name"  value="{{ old('last_name', isset($user) ? $user?->last_name : '') }}" autocomplete="family-name" class="block w-full @error('last_name') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('last_name')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="mobile_number" class="block text-sm font-medium leading-6 text-gray-900">Mobile</label>
                                <div class="mt-2">
                                    <input type="text" name="mobile_number" id="mobile_number"  value="{{ old('mobile_number', isset($user) ? $user?->mobile_number : '') }}" autocomplete="family-name" class="block w-full @error('mobile_number') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('mobile_number')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"  value="{{ old('email', isset($user) ? $user?->email : '') }}" class="block w-full @error('email') ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('email')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(!isset($user))
                            <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password"  value="{{ old('password') }}" autocomplete="password" class="block w-full @error("password") ring-red-300 @enderror rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Enter Password">
                                </div>
                                @error('password')
                                <div class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('users.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
