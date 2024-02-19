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
                {{ $buku->deskripsi }}
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
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold mt-7 mb-2">Ulasan Terbaru</h1>
                    <button data-modal-target="modalUlasan" data-modal-toggle="modalUlasan" type="button" class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
                <div class="container w-full p-4 shadow mb-2">
                    <div class="flex justify-between">
                        <div class="text-xl font-medium my-5">
                            <div>{{ $ulasanTerbaru->users->name }}</div>
                            <div class="text-sm text-gray-400 flex gap-2 items-center">
                                {{ $ulasanTerbaru->users->email }}
                                @if (Auth::check() && Auth::user()->id === $ulasanTerbaru->users->id)
                                    <div>
                                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="opsiUlasanTerbaru{{ $ulasanTerbaru->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                            </svg>
                                        </button>
                                        <div id="opsiUlasanTerbaru{{ $ulasanTerbaru->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44">
                                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
                                                <li>
                                                    <button data-modal-target="modalHapus" data-modal-toggle="modalHapus" type="button" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-xl font-bold flex gap-2 items-center">
                            {{ $ulasanTerbaru->rating }}
                            <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <p class="border rounded-lg p-4">{{ $ulasanTerbaru->ulasan }}</p>
                        </div>
                    </div>
                    <!-- Modal Ulasan -->
                    <div id="modalUlasan" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative px-10 bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Ulasan - {{ $buku->judul }}
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modalUlasan">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="container w-full p-4 shadow mb-2">
                                    @foreach ($ulasan as $index => $item)
                                        <div class="flex justify-between">
                                            <div class="text-xl font-medium my-5">
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
                                                                        <button data-modal-target="modalHapus" data-modal-toggle="modalHapus" type="button" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Hapus</button>
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Hapus -->
                    <div id="modalHapus" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modalHapus">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-800">Apakah Anda yakin ingin menghapus ini?</h3>
                                    <form action="{{ route('buku.ulasanDestroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, saya yakin
                                        </button>
                                        <button data-modal-hide="modalHapus" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak, batalkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
