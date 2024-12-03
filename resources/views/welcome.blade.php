<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
   <!-- Styles / Scripts -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-white dark:text-white/50">

    <nav class="bg-white dark:bg-gray-800 border-gray-200 p-4 drop-shadow-lg pt-6 pb-6" >
        <div class="flex flex-wrap justify-end items-center mx-auto max-w-screen-xl gap-6">
            <p class="bg-clip-text text-transparent bg-gradient-to-r from-red-300 via-gray-300 to-blue-200">{{ now()->format('d/m/Y | H:i')}}</p>
            <i class="fa-regular fa-calendar text-black dark:text-white"></i>
            <button id="theme-toggle">
                <i id="theme-toggle-icon" class="fas fa-sun text-black dark:text-white"></i>
            </button>
        </div>
        <!-- Border bottom dengan gradient -->
    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 via-green-200 to-blue-500"></div>
    </nav>



<section class="bg-white dark:bg-gray-800 flex justify-center items-center min-h-screen">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-1 sm:py-16 lg:px-6">
         <div class="flex justify-center">
             <img src="perpus2.png" class="w-1/2" alt="">
         </div>
            <div class="mt-4 md:mt-0 ">
                <div class="flex justify-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 via-green-200 to-blue-500 uppercase w-full text-center">Selamat Datang di E-Perpustakaan SMK PESAT ITXPRO</h2>
            </div>
                <p class="mb-6 font-normal text-gray-500 md:text-lg dark:text-gray-400 text-center"> Tempat di mana literasi, inspirasi, dan pengetahuan bertemu, dengan koleksi lengkap, fasilitas modern, serta layanan terbaik untuk mendukung kebutuhan belajar dan eksplorasi Anda.</p>

                 @if (Route::has('login'))
                            <nav class="flex flex-1 justify-center gap-4">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black bg-slate-300 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black bg-slate-300 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:bg-gray-500 dark:hover:text-white dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                   
                                @endauth
                            </nav>
                        @endif
            </div>
        </div>
    </section>
</body>

</html>