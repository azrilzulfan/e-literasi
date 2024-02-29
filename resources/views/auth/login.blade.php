<x-guest-layout>
    <div class="mb-10">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('img/logo.png') }}" alt="" width="150" height="150" class="mx-auto mb-10">
        </a>
        <h1 class="text-2xl font-semibold text-center">LOGIN</h1>
        <h2 class="text-primary font-semibold text-center">Selamat datang!</h2>
    </div>
    <div class="w-3/4">
        <form action="{{ route('login') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-secondary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full ps-10 p-2.5" placeholder="Email" required>
            </div>
            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-secondary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                </div>
                <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full ps-10 p-2.5" placeholder="Password" required>
            </div>
            <button type="submit" class="text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Login</button>
            <a href="{{ route('register') }}" class="text-secondary self-end hover:text-blue-500">Belum punya akun?</a>
        </form>
    </div>
</x-guest-layout>
