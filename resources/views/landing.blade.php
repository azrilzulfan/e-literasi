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
    </head>
    <body>
        <div class="flex">
            <div class="container mx-auto">
                <nav class="flex justify-between items-center pr-10">
                    <div class="flex space-x-10 items-center">
                        <a href="{{ route('beranda') }}" class="mr-5">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="100">
                        </a>
                    </div>
                    <div class="pr-2">
                        <div class="flex items-center gap-2 mt-5">
                            <a href="{{ route('login') }}" class="w-24 text-secondary bg-white hover:bg-secondary hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Login</a>
                            <a href="{{ route('register') }}" class="w-24 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Register</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-center text-secondary pt-10 pb-20">Selamat datang di <span class="text-primary">E-Literasi.</span></h1>
        </div>
        <div class="container py-8 mx-auto flex gap-5">
            <div class="w-[60%]">
                <div class="flex justify-between items-center mb-1">
                    <div class="text-xl font-bold">
                        Aplikasi Peminjaman Buku.
                    </div>
                </div>
                <div class="flex space-x-0 items-center">
                    <hr class="border-2 border-primary cursor-pointer w-[155px]">
                    <hr class="border-1 border-gray-300 cursor-pointer w-full">
                </div>
                <div class="rounded-xl mt-5 h-96">
                    <img src="{{ asset('img/landing.png') }}" class="rounded-xl shadow" height="400">
                </div>
            </div>
            <div class="w-[40%]">
                <div class="flex justify-between items-center mb-1">
                    <div class="text-xl font-bold">
                        Berbagai macam buku tersedia.
                    </div>
                </div>
                <div class="flex space-x-0 items-center">
                    <hr class="border-2 border-primary cursor-pointer w-[155px]">
                    <hr class="border-1 border-gray-300 cursor-pointer w-full">
                </div>
                <div class="grid grid-cols-3 mt-5 gap-2">
                    <div class="rounded-xl w-full">
                        <img src="{{ asset('img/landing1.jpg') }}" class="rounded-xl" height="400">
                    </div>
                    <div class="rounded-xl w-full">
                        <img src="{{ asset('img/landing3.jpg') }}" class="rounded-xl" height="400" >
                    </div>
                    <div class="rounded-xl w-full">
                        <img src="{{ asset('img/landing2.jpg') }}" class="rounded-xl" height="400">
                    </div>
                    <div class="rounded-xl w-full">
                        <img src="{{ asset('img/landing4.jpg') }}" class="rounded-xl" height="400">
                    </div>
                    <div class="rounded-xl w-full">
                        <img src="{{ asset('img/landing5.jpg') }}" class="rounded-xl" height="400">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex space-x-0 items-center">
            <hr class="border-2 border-primary cursor-pointer w-1/2">
            <hr class="border-1 border-gray-300 cursor-pointer w-full">
        </div>
        <div class="text-center mt-5 mb-52">
            <h1 class="text-2xl font-semibold">Daftar sekarang dan lakukan peminjaman buku.</h1>
            <div class="mt-5">
                <a href="{{ route('login') }}" class="w-24 text-white bg-secondary hover:bg-gray-700 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Login</a>
                <a href="{{ route('register') }}" class="w-24 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Register</a>
            </div>
        </div>
        <div class="container flex mx-auto items-center justify-between mb-10">
            <div class="flex gap-5">
                <div class="bg-secondary text-white p-1 rounded-xl">
                    <a href="https://www.instagram.com/azrilzulfan/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M8,3c-2.757,0 -5,2.243 -5,5v8c0,2.757 2.243,5 5,5h8c2.757,0 5,-2.243 5,-5v-8c0,-2.757 -2.243,-5 -5,-5zM8,5h8c1.654,0 3,1.346 3,3v8c0,1.654 -1.346,3 -3,3h-8c-1.654,0 -3,-1.346 -3,-3v-8c0,-1.654 1.346,-3 3,-3zM17,6c-0.55228,0 -1,0.44772 -1,1c0,0.55228 0.44772,1 1,1c0.55228,0 1,-0.44772 1,-1c0,-0.55228 -0.44772,-1 -1,-1zM12,7c-2.757,0 -5,2.243 -5,5c0,2.757 2.243,5 5,5c2.757,0 5,-2.243 5,-5c0,-2.757 -2.243,-5 -5,-5zM12,9c1.654,0 3,1.346 3,3c0,1.654 -1.346,3 -3,3c-1.654,0 -3,-1.346 -3,-3c0,-1.654 1.346,-3 3,-3z"></path></g></g>
                        </svg>
                    </a>
                </div>
                <div class="bg-secondary text-white p-1 rounded-xl">
                    <a href="https://wa.me/6289506402057" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,2.25121 0.63234,4.35007 1.71094,6.15039l-1.60352,5.84961l5.97461,-1.56836c1.74732,0.99342 3.76446,1.56836 5.91797,1.56836c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12zM10.89258,9.40234c0.195,0 0.39536,-0.00119 0.56836,0.00781c0.214,0.005 0.44692,0.02067 0.66992,0.51367c0.265,0.586 0.84202,2.05608 0.91602,2.20508c0.074,0.149 0.12644,0.32453 0.02344,0.51953c-0.098,0.2 -0.14897,0.32105 -0.29297,0.49805c-0.149,0.172 -0.31227,0.38563 -0.44727,0.51563c-0.149,0.149 -0.30286,0.31238 -0.13086,0.60938c0.172,0.297 0.76934,1.27064 1.65234,2.05664c1.135,1.014 2.09263,1.32561 2.39063,1.47461c0.298,0.149 0.47058,0.12578 0.64258,-0.07422c0.177,-0.195 0.74336,-0.86411 0.94336,-1.16211c0.195,-0.298 0.39406,-0.24644 0.66406,-0.14844c0.274,0.098 1.7352,0.8178 2.0332,0.9668c0.298,0.149 0.49336,0.22275 0.56836,0.34375c0.077,0.125 0.07708,0.72006 -0.16992,1.41406c-0.247,0.693 -1.45991,1.36316 -2.00391,1.41016c-0.549,0.051 -1.06136,0.24677 -3.56836,-0.74023c-3.024,-1.191 -4.93108,-4.28828 -5.08008,-4.48828c-0.149,-0.195 -1.21094,-1.61031 -1.21094,-3.07031c0,-1.465 0.76811,-2.18247 1.03711,-2.48047c0.274,-0.298 0.59492,-0.37109 0.79492,-0.37109z"></path></g></g>
                        </svg>
                    </a>
                </div>
                <div class="bg-secondary text-white p-1 rounded-xl">
                    <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=azrilazril0160@gmail.com" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[30px] h-[30px]">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <a href="{{ route('beranda') }}" class="mr-5">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="100">
                </a>
            </div>
        </div>
    </body>
</html>
