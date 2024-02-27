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
            @if ($buku->kategori_id != null)
            <div class="mb-10 text-sm">
                <span class="text-gray-400">{{ $buku->kategori->nama_kategori }}</span> / {{ $buku->judul }}
            </div>
            @endif
            <div class="mb-5 text-3xl font-bold">
                {{ $buku->judul }}
            </div>
            <div class="font-semibold mb-2">
                {{ $buku->penulis }}
            </div>
            <div class="my-5 max-h-[200px] scrollable overflow-y-auto">
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
                <div>
                    <div class="mb-1 font-semibold">Stok Buku</div>
                    <div>{{ $buku->stok }}</div>
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
                        <div class="text-xl font-bold flex gap-2 items-center">{{ $ulasan->count() }} <span class="px-2 py-1 text-xs font-medium text-center text-white bg-secondary rounded-lg">Ulasan</span></div>
                    </div>
                    <div>
                        <div class="mb-2 font-semibold">Rating</div>
                        <div class="text-xl font-bold flex gap-2 items-center">
                            {{ number_format($avg, 1) }}
                            <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[40%]">
            <div>
                <img class="rounded-lg shadow" src="{{ asset($buku->foto) }}" alt="">
            </div>
        </div>
    </div>
</x-app-layout>

<div class="w-[25%] p-10 min-h-screen bg-secondary text-white fixed top-0 right-0" style="overflow: visible;">
    <div class="container w-full p-4 mb-5 shadow rounded-lg">
        <div class="text-xl font-semibold mb-5">Ulasan</div>
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
                    <button type="submit" class="w-full text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @if ($ulasan->count() > 0)
        <div class="px-4 max-h-[500px] overflow-y-auto scrollable">
            @foreach ($ulasan as $index => $item)
            <div class="mb-10 bg-gray-700 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-5">
                        <div>
                            <h1 class="text-lg">{{ $item->users->name }}</h1>
                            <h2 class="text-xs text-primary">{{ $item->users->email }}</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            {{ $item->rating }}
                            <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                        </div>
                    </div>
                    @if (Auth::check() && Auth::user()->id === $item->users->id)
                    <div>
                        <form action="{{ route('buku.ulasanDestroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-2 text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 hover:text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="mt-3 text-gray-400">
                    <p>{{ $item->ulasan }}</p>
                </div>
            </div>
            @endforeach
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
