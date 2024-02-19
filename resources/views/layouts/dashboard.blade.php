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

        <style>
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
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50">
        <nav class="fixed top-0 z-30 w-full bg-white border-b-2 border-gray-200">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <div></div>
                    </div>
                    <div class="flex items-center p-4">
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
                </div>
            </div>
        </nav>

        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-10 transition-transform -translate-x-full bg-white sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full pb-4 overflow-y-auto bg-white flex flex-col">
                <div class="flex justify-center">
                    <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="100">
                    </a>
                </div>
                <div class="py-8 flex flex-col gap-7">
                    <div class="group relative">
                        <a href="{{ route('dashboard') }}" class="flex gap-2 items-center px-8 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                            </svg>
                            <span class="group-hover:text-primary">Dashboard</span>
                        </a>
                        @if(request()->routeIs('dashboard'))
                            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                        @endif
                    </div>
                    <div class="group relative">
                        <button type="button" class="flex gap-2 items-center px-8 text-lg font-medium w-full" data-collapse-toggle="dropdown-buku">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span>Data Buku</span>
                            <svg class="w-3 h-3 ml-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <ul id="dropdown-buku" class="{{ request()->routeIs('dataBuku.index','kategori.index','kategoriBukuRelasi.index') ? '' : 'hidden' }} py-2 space-y-2">
                            <li class="relative">
                                <a href="{{ route('dataBuku.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:text-primary">Buku</a>
                                @if(request()->routeIs('dataBuku.index'))
                                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                                @endif
                            </li>
                            <li class="relative">
                                <a href="{{ route('kategori.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:text-primary">Kategori</a>
                                @if(request()->routeIs('kategori.index'))
                                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                                @endif
                            </li>
                            <li class="relative">
                                <a href="{{ route('kategoriBukuRelasi.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:text-primary">Kategori Buku</a>
                                @if(request()->routeIs('kategoriBukuRelasi.index'))
                                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="group relative">
                        <a href="{{ route('peminjaman.index') }}" class="flex gap-2 items-center px-8 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                            </svg>
                            <span class="group-hover:text-primary">Peminjaman</span>
                        </a>
                        @if(request()->routeIs('peminjaman.index'))
                            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                        @endif
                    </div>
                    <div class="group relative">
                        <button type="button" class="flex gap-2 items-center px-8 text-lg font-medium w-full" data-collapse-toggle="dropdown-pengguna">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <span>Data Pengguna</span>
                            <svg class="w-3 h-3 ml-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <ul id="dropdown-pengguna" class="hidden py-2 space-y-2">
                            @if (Auth::user()->role == 'admin')
                            <li class="relative">
                                <a href="{{ route('petugas.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:text-primary">Petugas</a>
                                @if(request()->routeIs('petugas.index'))
                                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                                @endif
                            </li>
                            @endif
                            <li class="relative">
                                <a href="{{ route('anggota.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:text-primary">Anggota</a>
                                @if(request()->routeIs('anggota.index'))
                                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-10 rounded-tr-lg rounded-br-lg bg-primary"></div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="p-4 ml-72 mt-24">
            {{ $slot }}
        </div>
        <div id="toast-success" class="fixed hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-xl top-24 right-5" role="alert">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
