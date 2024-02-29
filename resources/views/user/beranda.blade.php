<x-app-layout>
    <h1 class="text-xl text-secondary font-semibold">Buku Terbaru</h1>
    <div class="flex gap-5 pt-5">
        @foreach ($bukuTerbaru as $bukuTerbaru)
        <div class="bg-white w-full rounded-lg shadow flex items-end justify-between">
            <div class="flex items-center">
                <div class="py-5 pr-10 pl-5">
                    <img src="{{ asset($bukuTerbaru->foto) }}" alt="" width="150" class="rounded-lg">
                </div>
                <div class="py-5">
                    <h2 class="text-xl font-semibold text-secondary">{{ $bukuTerbaru->judul }}</h2>
                    <p class="text-gray-400">{{ $bukuTerbaru->penulis }}</p>
                    <div class="flex gap-10 mt-5 items-center">
                        <div class="flex flex-col items-center">
                            @if ($bukuTerbaru->kategori_id != null)
                            <h3 class="px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-lg">{{ $bukuTerbaru->kategori->nama_kategori }}</h3>
                            @endif
                            <p class="text-gray-400">kategori</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-secondary font-semibold text-lg">{{ $bukuTerbaru->ulasan->count() }}</h3>
                            <p class="text-gray-400">ulasan</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-secondary font-semibold text-lg">
                                @if(isset($averages[$bukuTerbaru->id]))
                                    {{ number_format($averages[$bukuTerbaru->id], 1) }}
                                    <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                                @else
                                    <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                                @endif
                            </h3>
                            <p class="text-gray-400">rating</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <button onclick="window.location.href='{{ route('buku.show', $bukuTerbaru->slug) }}'" class="bg-primary text-white p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="my-10">
        <form action="{{ route('beranda') }}" method="GET" id="formPencarian" class="flex items-center space-x-4">
            <div class="w-3/4">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="pencarianBuku" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-300 focus:border-blue-300" placeholder="Pencarian Buku ...">
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
                </div>
            </div>
            <div class="w-1/4">
                <select id="pencarianBuku" name="query" onchange="submitKategori()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-4">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <script>
                function submitKategori() {
                    document.getElementById("formPencarian").submit();
                }
            </script>
        </form>
    </div>
    <h1 class="text-xl text-secondary font-semibold">Daftar Buku</h1>
    <div class="grid grid-cols-6 gap-2 py-5">
        @foreach ($buku as $item)
        <div class="max-w-sm max-h-[500px] bg-white border border-gray-200 rounded-lg shadow">
            <a href="{{ route('buku.show', $item->slug) }}">
                <img class="rounded-t-lg" src="{{ asset($item->foto) }}" alt="{{ $item->foto }}" width="250"/>
            </a>
            <div class="p-5">
                @if ($item->kategori_id != null)
                <div>
                    <span class="px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-lg">{{ $item->kategori->nama_kategori }}</span>
                </div>
                @endif
                <h1 class="mb-3 mt-3 text-sm font-semibold text-secondary">{{ Str::limit($item->judul, 50) }}</h1>
                <p class="mb-3 mt-3 text-sm font-semibold text-gray-400">{{ $item->penulis }}</p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>

<div class="w-[25%] p-10 min-h-screen bg-secondary text-white fixed top-0 right-0">
    @if ($randomBuku)
    <div>
        <img src="{{ asset($randomBuku->foto) }}" alt="" width="200" class="rounded-xl mx-auto border-2">
        <div class="text-center my-5">
            <h1 class="text-xl font-semibold">{{ $randomBuku->judul }}</h1>
            <p class="text-gray-400">{{ $randomBuku->penulis }}</p>
        </div>
        <div class="flex gap-10 items-center bg-gray-700 p-4 rounded-xl justify-between">
            <div class="flex flex-col items-center">
                @if ($randomBuku->kategori_id != null)
                <h3 class="px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-lg">{{ $randomBuku->kategori->nama_kategori }}</h3>
                @endif
                <p class="text-gray-400">kategori</p>
            </div>
            <div class="text-xl">|</div>
            <div class="flex flex-col items-center">
                <h3 class="font-semibold text-lg">{{ $randomBuku->ulasan->count() }}</h3>
                <p class="text-gray-400">ulasan</p>
            </div>
            <div class="text-xl">|</div>
            <div class="flex flex-col items-center">
                <h3 class="font-semibold text-lg">
                    @if (isset($averages[$randomBuku->id]))
                        {{ number_format($averages[$randomBuku->id], 1) }}
                        <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                    @else
                        <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                    @endif
                </h3>
                <p class="text-gray-400">rating</p>
            </div>
        </div>
        <div class="my-5">
            <h1 class="text-lg font-semibold mb-5">Deskripsi</h1>
            <p class="text-gray-400 max-h-[200px] overflow-y-auto scrollable">{{ $randomBuku->deskripsi }}</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 p-10 text-center">
            <button onclick="window.location.href='{{ route('buku.show', $randomBuku->slug) }}'" class="w-full text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center">Lihat Detail Buku</button>
        </div>
    </div>
    @endif
</div>
