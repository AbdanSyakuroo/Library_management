<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->

        <main>
            <nav class="bg-white dark:bg-gray-800 border-gray-200 p-4 drop-shadow-lg pt-6 pb-6">
                <div class="flex flex-wrap justify-between gap-y-4">
                    <!-- Sidebar Toggle Button -->
                    <div>
                        <button data-drawer-target="default-sidebar" 
                                data-drawer-toggle="default-sidebar"
                                aria-controls="default-sidebar" 
                                type="button"
                                class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:block md:block hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                            </svg>
                        </button>
                    </div>
            
                    <!-- Center Content -->
                    <div class="flex justify-end items-center gap-x-4">
                        <p class="bg-clip-text text-transparent bg-gradient-to-r from-red-300 via-gray-300 to-blue-300">
                            {{ now()->format('d/m/Y | H:i') }}
                        </p>
                         <i class="fa-regular fa-calendar text-black dark:text-white"></i>
            <button id="theme-toggle">
                <i id="theme-toggle-icon" class="fas fa-sun text-black dark:text-white"></i>
            </button>
                    </div>
                </div>
            
                <!-- Bottom Gradient Border -->
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-300 via-green-300 to-blue-300"></div>
            </nav>
            
            {{ $slot }}
        </main>
    </div>
</body>

</html>
