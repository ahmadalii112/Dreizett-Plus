<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (isset($heading))
            {{ $heading }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.ico')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @if(isset($styles))
        {{ $styles }}
    @endif
    <style>
        [x-cloak] {
            display: none;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full">
        <div class="min-h-screen bg-gray-100">
            <div x-data="{ open: false }" @keydown.window.escape="open = false">
            @include('layouts.navigation')

                <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                    <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>


                    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                        <form class="relative flex flex-1"></form>
                        <div class="flex items-center gap-x-4 lg:gap-x-6">
                            @include('layouts.localization')

                            <!-- Separator -->
                            <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true"></div>

                            <!-- Profile dropdown -->
                            <div class="">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2  border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->full_name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit', auth()->user())">
                                            {{ trans('language.users.profile')  }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ trans('language.auth_pages.logout')  }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Heading -->

            <!-- Page Content -->
                <div class="lg:pl-72">
                    <main>
                        @if (isset($header))
                            <header class="bg-white shadow">
                                <div class=" mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif
                        {{ $slot }}
                            <!-- Notification Message -->
                            <x-notification />
                    </main>
                </div>
        </div>
    </div>
    @stack('scripts')
</body>
    <script>
        (function(){
            $('.from-prevent-multiple-submits').on('submit', function(){
                $('.from-prevent-multiple-submits').attr('disabled','true');
            })
        })();
        // Design DataTables
        $(function () {
            var dataTablesLength = $('#DataTables_Table_0_length').addClass('float-left mb-2');
            var dataTablesFilter = $('#DataTables_Table_0_filter').addClass('float-right mb-2');
            var selectElement = $('[name="DataTables_Table_0_length"]')
                .addClass('form-select form-select-sm mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6')
                .attr('id', 'location');

            var searchInput = $('#DataTables_Table_0_filter input[type="search"]')
                .addClass('block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6')
                .attr('placeholder', 'Search...');
            // Style the filter label if needed
            var filterLabel = $('#DataTables_Table_0_filter label')
                .addClass(' text-sm font-medium leading-6 text-gray-900');

            $('#search-input').on('keyup', function () {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    table.search($('#search-input').val()).draw();
                }, 750);
            });
        });
    </script>
</html>
