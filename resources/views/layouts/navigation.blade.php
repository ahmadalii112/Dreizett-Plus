<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center ">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="dreizettPlus" class="w-48">
                </a>
        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }} " fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                {{ trans('language.dashboard') }}
                            </x-nav-link>
                        </li>
                        @hasanyrole(\App\Enums\RoleTypeEnum::ADMINISTRATION->value .'|'. \App\Enums\RoleTypeEnum::MANAGEMENT->value)
                        <li>
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                                <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('users.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                </svg>
                                {{ trans_choice('language.users.users', 1) }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link :href="route('residential-communities.index')" :active="request()->routeIs('residential-communities.*')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                     class="h-6 w-6 shrink-0 {{ request()->routeIs('residential-communities.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                                {{ trans_choice("language.residential_community.community", 1) }}
                            </x-nav-link>
                        </li>
                        {{--<li>
                            <x-nav-link :href="route('shared-apartments.index')" :active="request()->routeIs('shared-apartments.*')">
                                <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('shared-apartments.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                </svg>
                                {{ trans_choice("language.shared_apartments.apartments|apartment", 1) }}
                            </x-nav-link>
                        </li>--}}
                        <li>
                            <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6 shrink-0 {{ request()->routeIs('rooms.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 512 512"
                                     xml:space="preserve">
                                            <style>
                                                /* Add this CSS style to set the fill color to gray */
                                                .gray-fill {
                                                    fill: gray;
                                                }
                                                .active-fill {
                                                    fill: #4f46e5;
                                                }
                                            </style>
                                    <g>
                                        <!-- Apply the gray-fill class to all path elements to make them gray -->
                                        <path class="{{ request()->routeIs('rooms.*') ? 'active-fill' : 'gray-fill' }}"
                                              d="M452.3,439.8V81.4h-93.9v-80L76.8,50v389.9H0v34.1h92.7l265.7,36.7V115.5h59.7v358.4H512v-34.1L452.3,439.8z M324.3,471.4 L110.9,442V78.7l213.3-36.8V471.4z"/>
                                        <rect class="{{ request()->routeIs('rooms.*') ? 'active-fill' : 'gray-fill' }}" x="256" y="235" width="34.1" height="68.3"/>
                                    </g>
                                        </svg>



                                {{ trans_choice("language.rooms.rooms", 1) }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link :href="route('tenants.index')" :active="request()->routeIs('tenants.*')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                     class="h-6 w-6 shrink-0 {{ request()->routeIs('tenants.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                                </svg>

                                {{  trans_choice('language.tenants.tenants', 1) }}
                            </x-nav-link>
                        </li>
                        @endhasanyrole
                        <li>
                            <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.*')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                     class="h-6 w-6 shrink-0 {{ request()->routeIs('tickets.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                </svg>
                                {{  trans_choice('language.tickets.tickets', 1) }}
                            </x-nav-link>

                        </li>
                        @hasrole(\App\Enums\RoleTypeEnum::ADMINISTRATION->value)
                        <li>
                            <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')">
                                <svg
                                    class="h-6 w-6 shrink-0 {{ request()->routeIs('settings.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                    fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{  trans('language.settings') }}
                            </x-nav-link>

                        </li>
                        @endhasrole
                    </ul>
                </li>
                <li class="mt-auto">
                    <x-nav-link :href="route('profile.edit', auth()->user())" :active="request()->routeIs('profile.*')" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 {{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>

                        {{  trans_choice('language.users.profile', 1) }}
                    </x-nav-link>

                </li>
            </ul>
        </nav>
    </div>
</div>


<!--  sidebar for Responsive -->
<div x-show="open" class="relative z-50 lg:hidden"
     x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
     aria-modal="true" style="display: none;">

    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-900/80"
         x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."
         style="display: none;"></div>


    <div class="fixed inset-0 flex">

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
             x-description="Off-canvas menu, show/hide based on off-canvas menu state."
             class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false"
             style="display: none;">

            <div x-show="open" x-transition:enter="ease-in-out duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 x-description="Close button, show/hide based on off-canvas menu state."
                 class="absolute left-full top-0 flex w-16 justify-center pt-5" style="display: none;">
                <button type="button" class="-m-2.5 p-2.5" @click="open = false">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
                <div class="flex h-16 shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="dreizettPlus" class="w-48">
                    </a>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }} " fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    {{ trans('language.dashboard') }}
                                </x-nav-link>
                                @hasanyrole(\App\Enums\RoleTypeEnum::ADMINISTRATION->value .'|'. \App\Enums\RoleTypeEnum::MANAGEMENT->value)
                                <li>
                                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                                        <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('users.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                        </svg>
                                        {{ trans_choice('language.users.users', 1) }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('residential-communities.index')" :active="request()->routeIs('residential-communities.*')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="h-6 w-6 shrink-0 {{ request()->routeIs('residential-communities.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                        </svg>
                                        {{ trans_choice("language.residential_community.community", 1) }}
                                    </x-nav-link>
                                </li>
                                {{--<li>
                                    <x-nav-link :href="route('shared-apartments.index')" :active="request()->routeIs('shared-apartments.*')">
                                        <svg class="h-6 w-6 shrink-0 {{ request()->routeIs('shared-apartments.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                        </svg>
                                        {{ trans_choice("language.shared_apartments.apartments|apartment", 1) }}
                                    </x-nav-link>
                                </li>--}}
                                <li>
                                    <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                             class="h-6 w-6 shrink-0 {{ request()->routeIs('rooms.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 512 512"
                                             xml:space="preserve">
                                            <style>
                                                /* Add this CSS style to set the fill color to gray */
                                                .gray-fill {
                                                    fill: gray;
                                                }
                                                .active-fill {
                                                    fill: #4f46e5;
                                                }
                                            </style>
                                            <g>
                                                <!-- Apply the gray-fill class to all path elements to make them gray -->
                                                <path class="{{ request()->routeIs('rooms.*') ? 'active-fill' : 'gray-fill' }}"
                                                      d="M452.3,439.8V81.4h-93.9v-80L76.8,50v389.9H0v34.1h92.7l265.7,36.7V115.5h59.7v358.4H512v-34.1L452.3,439.8z M324.3,471.4 L110.9,442V78.7l213.3-36.8V471.4z"/>
                                                <rect class="{{ request()->routeIs('rooms.*') ? 'active-fill' : 'gray-fill' }}" x="256" y="235" width="34.1" height="68.3"/>
                                            </g>
                                        </svg>



                                        {{ trans_choice("language.rooms.rooms", 1) }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('tenants.index')" :active="request()->routeIs('tenants.*')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="h-6 w-6 shrink-0 {{ request()->routeIs('tenants.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                                        </svg>

                                        {{  trans_choice('language.tenants.tenants', 1) }}
                                    </x-nav-link>
                                </li>
                                @endhasanyrole
                                <li>
                                    <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.*')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="h-6 w-6 shrink-0 {{ request()->routeIs('tickets.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                        </svg>
                                        {{  trans_choice('language.tickets.tickets', 1) }}
                                    </x-nav-link>
                                </li>
                                @hasrole(\App\Enums\RoleTypeEnum::ADMINISTRATION->value)
                                <li>
                                    <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')">
                                        <svg
                                            class="h-6 w-6 shrink-0 {{ request()->routeIs('settings.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"
                                            fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{trans('language.settings') }}
                                    </x-nav-link>

                                </li>
                                @endhasrole
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <x-nav-link :href="route('profile.edit', auth()->user())" :active="request()->routeIs('profile.*')" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 {{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                {{  trans_choice('language.users.profile', 1) }}
                            </x-nav-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>



