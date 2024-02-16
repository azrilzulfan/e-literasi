<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'E-Literasi') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="container min-w-full bg-primary min-h-screen flex">
            <div class="w-1/2 flex items-center">
                <div class="rounded-xl bg-white/35 w-3/4 h-3/4 mx-auto shadow-xl flex items-center">
                    @if(Request::is('login'))
                        <img src="{{ asset('img/login.png') }}" alt="">
                    @else
                        <img src="{{ asset('img/register.png') }}" alt="">
                    @endif
                </div>
            </div>
            <div class="w-1/2 bg-white px-28 {{ request()->routeIs('login') ? 'py-28' : 'py-5' }} flex flex-col items-center">
                {{ $slot }}
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</html>
