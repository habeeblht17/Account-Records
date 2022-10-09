<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased"
    x-data="{'darkMode': false}"
    x-init="
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
    <div :class="{'dark': darkMode === true}">
        <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="">
                <!-- SideNav-->
                <x-sideNav />
            </div>

            <div  class="flex flex-col w-full">
                <!-- Primary Navmenu -->
                <x-navMenu />

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="shadow-sm dark:shadow-gray-800">
                        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-4 lg:px-6">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="px-2 md:px-6 dark:text-gray-200">
                    {{ $slot }}
                </main>
            </div>

            @stack('modals')

            @livewireScripts

            <script>

                function toggleSideBar () {
                    document.querySelector('#sideBar').classList.toggle('hidden');
                }

                toggleSideBar()
            </script>

        </div>
    </div>
    </body>
</html>
