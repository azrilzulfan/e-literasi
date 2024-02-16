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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .mask-star-2:checked {
                background-color: #ffce00;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="text-gray-900 bg-gray-50 min-h-screen">
            <div class="bg-white shadow px-20 mb-6">
                <div class="flex justify-between items-center">
                    <a href="{{ route('beranda') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="100">
                    </a>
                    <div class="flex space-x-10 items-center">
                        <a href="{{ route('beranda') }}" class="hover:text-primary active:text-primary">Beranda</a>
                        <a href="{{ route('koleksi.index') }}" class="hover:text-primary active:text-primary">Koleksi</a>
                        <a href="{{ route('buku.random') }}" class="bg-transparent text-primary border-2 border-primary hover:bg-primary hover:text-white hover:border-transparent font-bold rounded-full text-sm px-5 py-2.5 text-center me-2 flex items-center gap-2">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                            Pinjam Buku Baru
                        </a>
                    </div>
                    @if (Route::has('login'))
                        @auth
                        <button type="button" class="flex gap-4 items-center ms-3 font-medium" data-dropdown-toggle="dropdown-user">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                              <p class="text-sm text-gray-900" role="none">
                                {{ Auth::user()->nama_lengkap }}
                              </p>
                              <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ Auth::user()->email }}
                              </p>
                            </div>
                            <ul class="py-1" role="none">
                              <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</button>
                                </form>
                              </li>
                            </ul>
                        </div>
                    @else
                        <div class="flex items-center gap-2 mt-5">
                            <a href="{{ route('login') }}" class="w-24 text-secondary bg-white hover:bg-secondary hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Login</a>
                            <a href="{{ route('register') }}" class="w-24 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Register</a>
                        </div>
                        @endauth
                    @endif
                </div>
            </div>

            <div class="py-6 px-20">
                {{ $slot }}
            </div>
        </div>

        <footer class="bg-white border-t-2">
            <div class="w-full max-w-screen-xl mx-auto p-2">
                <div class="flex items-center justify-between">
                    <a href="{{ route('beranda') }}" class="flex items-center mb-4 space-x-3">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="115" height="115">
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500">
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-2 border-gray-200 mx-auto" />
                <span class="block text-sm text-gray-500 text-center">© 2024 E-LITERASI™. All Rights Reserved.</span>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</html>
