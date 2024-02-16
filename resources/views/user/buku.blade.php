<x-app-layout>
    <div class="container flex gap-5 w-3/4 mx-auto mb-5">
        <div class="w-[60%]">
            <div class="mb-5">
                <button type="button" onclick="history.back()">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                </button>
            </div>
            <div class="mb-10 text-sm">
                @foreach ($buku->kategoriBukuRelasi as $kategoriBuku)
                    <span class="text-gray-400">{{ $kategoriBuku->kategori->nama_kategori }}</span> / {{ $buku->judul }}
                @endforeach
            </div>
            <div class="mb-5 text-3xl font-bold">
                {{ $buku->judul }}
            </div>
            <div class="font-semibold mb-2">
                {{ $buku->penulis }}
            </div>
            <div class="my-5">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, dolorem asperiores deleniti ullam eum sint mollitia non sequi, pariatur laboriosam ipsa illo voluptates cum, quidem ea. Sequi sit quisquam aliquid.
            </div>
            <div class="text-sm flex gap-5">
                <div>
                    <div class="mb-1 font-semibold">Penerbit</div>
                    <div>{{ $buku->penerbit }}</div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Tahun Terbit</div>
                    <div>{{ $buku->tahun_terbit }}</div>
                </div>
            </div>
            <div>
                @if ($buku->stok != '0')
                    <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST">
                        @csrf
                        <div>
                            <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="w-36 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Pinjam Buku</button>
                        </div>
                    </form>
                @else
                    <div class="mt-10">
                        <button type="button" onclick="history.back()" class="w-40 text-white bg-red-400 hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Buku Tidak Tersedia</button>
                    </div>
                @endif
            </div>
            <div class="mt-10">
                <div class="text-2xl font-bold mb-5">Ulasan</div>
                <div class="flex gap-20 mb-10">
                    <div>
                        <div class="mb-2 font-semibold">Total</div>
                        <div class="text-xl font-bold flex gap-2 items-center">{{ $ulasan->total() }} <span class="px-2 py-1 text-xs font-medium text-center text-white bg-secondary rounded-lg">Ulasan</span></div>
                    </div>
                    <div>
                        <div class="mb-2 font-semibold">Rating</div>
                        <div class="text-xl font-bold flex gap-2 items-center">
                            {{ number_format($avg, 1) }}
                            <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="container w-full p-4 shadow rounded-lg">
                        <div class="text-xl font-medium mb-5">Ulasan</div>
                        <div>
                            <form action="{{ route('buku.ulasanStore', $buku->id) }}" method="POST">
                                @csrf
                                <div>
                                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                </div>
                                <div class="rating rating-md">
                                    <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-yellow-300" />
                                    <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-yellow-300" />
                                    <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-yellow-300" />
                                    <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-yellow-300" checked/>
                                    <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-yellow-300" />
                                </div>
                                <div class="mt-2">
                                    <textarea id="ulasan" name="ulasan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tinggalkan komentar..."></textarea>
                                </div>
                                <div class="mt-5 text-end">
                                    <button type="submit" class="w-36 text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[40%]">
            <div>
                <img class="w-[400px] h-[550px] rounded-lg shadow" src="{{ asset($buku->foto) }}" alt="">
            </div>
            @if ($ulasan->count() > 0)
                <div id="slider-ulasan" class="relative w-full shadow mt-5" data-carousel="static">
                    <div class="relative h-56 overflow-hidden rounded-lg">
                        @foreach ($ulasan as $index => $item)
                            <div class="hidden duration-700 ease-in-out py-5 px-8" data-carousel-item>
                                <div class="container w-full p-4">
                                    <div class="flex justify-between">
                                        <div class="text-xl font-medium mb-5">
                                            <div>{{ $item->users->name }}</div>
                                            <div class="text-sm text-gray-400 flex gap-2 items-center">
                                                {{ $item->users->email }}
                                                @if (Auth::check() && Auth::user()->id === $item->users->id)
                                                    <div>
                                                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="opsiUlasan{{ $index }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                                            </svg>
                                                        </button>
                                                        <div id="opsiUlasan{{ $index }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44">
                                                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
                                                                <li>
                                                                    <form action="{{ route('buku.ulasanDestroy', $item->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Hapus</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="text-xl font-bold flex gap-2 items-center">
                                            {{ $item->rating }}
                                            <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-2">
                                            <p class="border rounded-lg p-4">{{ $item->ulasan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                            <svg class="w-4 h-4 text-secondary rtl:rotate-180 mr-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                            <svg class="w-4 h-4 text-secondary rtl:rotate-180 ml-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                <div class="mt-2">
                    {{ $ulasan->links() }}
                </div>
            @else
                <div class="flex items-center p-4 mb-4 text-sm text-red-500 rounded-lg bg-red-100 mt-5">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        Belum ada ulasan untuk buku ini.
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<div id="toast-default" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
        </svg>
        <span class="sr-only">Fire icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Set yourself free.</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
