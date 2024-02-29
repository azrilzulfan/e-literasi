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

            .line {
                width: 100%;
                height: 5px;
                background-color: #22c55e;
                margin-top: 5px;
                position: absolute;
                left: 0;
                bottom: 0;
                animation: lineFade 5s linear forwards;
            }

            /* Animasi garis memudar */
            @keyframes lineFade {
                from {
                    width: 100%;
                }
                to {
                    width: 0;
                }
            }

            .scrollable::-webkit-scrollbar {
                display: none;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-white min-h-screen">
        <div class="flex pl-20">
            <div class="w-[75%]">
                <nav class="flex justify-between items-center pr-10">
                    <div class="flex space-x-10 items-center">
                        <a href="{{ route('beranda') }}" class="mr-5">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="100">
                        </a>
                        <a href="{{ route('beranda') }}" class="hover:text-primary">Beranda</a>
                        <a href="{{ route('koleksi.index') }}" class="hover:text-primary">Koleksi Peminjaman Buku</a>
                        <a href="{{ route('buku.random') }}" class="bg-transparent text-primary border-2 border-primary hover:bg-primary hover:text-white hover:border-transparent font-bold rounded-full text-sm px-5 py-2.5 text-center me-2 flex items-center gap-2">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                            Pinjam Buku Baru
                        </a>
                    </div>
                    <div class="pr-2">
                        @if (Route::has('login'))
                        @auth
                        <div class="flex gap-2">
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
                        </div>
                        @else
                            <div class="flex items-center gap-2 mt-5">
                                <a href="{{ route('login') }}" class="w-24 text-secondary bg-white hover:bg-secondary hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Login</a>
                                <a href="{{ route('register') }}" class="w-24 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Register</a>
                            </div>
                            @endauth
                        @endif
                    </div>
                </nav>
                <div class="py-10 pr-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div id="toast-success" class="absolute z-10 hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-xl top-5 right-5" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}</div>
            <div class="line"></div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</html>

<script>
    function showToast() {
        var toast = document.getElementById('toast-success');
        toast.style.display = 'flex';

        setTimeout(function(){
            toast.style.display = 'none';
        }, 5000);
    }

    window.addEventListener('load', function() {
        var successMessage = '{{ Session::get('success') }}';
        if (successMessage) {
            showToast();
            document.getElementById('toast-success').style.display = 'flex';
            {{ Session::forget('success') }};
        }
    });
</script>
