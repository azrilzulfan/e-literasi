<x-app-layout>
    <div class="mb-8">
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

    <div class="mb-8">
        <div class="font-bold text-lg mb-2">Daftar Buku</div>
        <div class="flex space-x-0 items-center">
            <hr class="border-2 border-primary cursor-pointer w-[105px]">
            <hr class="border-1 border-gray-300 cursor-pointer w-full">
        </div>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-7 gap-2" id="daftarBuku">
            @foreach ($buku as $item)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="{{ route('buku.show', $item->id) }}">
                    <img class="rounded-t-lg" src="{{ asset($item->foto) }}" alt="{{ $item->foto }}" />
                </a>
                <div class="p-5">
                    <div>
                        @foreach ($item->kategoriBukuRelasi as $kategoriBuku)
                            <span class="px-3 py-2 text-xs font-medium text-center text-white bg-secondary rounded-lg">{{ $kategoriBuku->kategori->nama_kategori }}</span>
                        @endforeach
                    </div>
                    <p class="mb-3 mt-3 text-sm font-semibold text-gray-500">{{ $item->judul }}</p>
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-sm font-semibold tracking-tight text-gray-900">{{ $item->penulis }}</h5>
                        <div class="flex justify-end gap-2 text-lg font-bold items-center bg-gray-50 hover:bg-gray-100 py-1 px-2 rounded-full">
                            @if(isset($averages[$item->id]))
                                {{ number_format($averages[$item->id], 1) }}
                                <input type="radio" disabled class="mask mask-star-2 bg-yellow-300" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
