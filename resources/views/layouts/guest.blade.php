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
         <!-- Styles / Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="bg-white dark:bg-gray-800 border-gray-200 p-4 drop-shadow-lg pt-6 pb-6" >
            <div class="flex flex-wrap justify-end items-center mx-auto max-w-screen-xl gap-6">
                <p class="bg-clip-text text-transparent bg-gradient-to-r from-red-300 via-gray-300 to-blue-200">{{ now()->format('l, d M Y | H:i')}}</p>
                <i class="fa-regular fa-calendar text-black dark:text-white"></i>
                <button id="theme-toggle">
                    <i id="theme-toggle-icon" class="fas fa-sun text-black dark:text-white"></i>
                </button>
            </div>
    
            <!-- Border bottom dengan gradient -->
        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-300 via-amber-300 to-blue-300"></div>
        </nav>
        <div class="min-h-screen flex lg:flex-row flex-col sm:flex-col justify-center items-center pt-6  gap-20 px-10 sm:pb-20 lg:mt-0 sm:pt-20 dark:bg-gray-800">

            <div>
                <img src="sis.png" alt="" width="500">
            </div>

            <div class="w-full flex justify-center max-w-lg lg:max-w-md mt-6 px-6 py-4 bg-blue-800 shadow-md  sm:rounded-lg ">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
