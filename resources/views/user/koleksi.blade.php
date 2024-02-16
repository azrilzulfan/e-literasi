<x-app-layout>
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">
                Koleksi Buku
            </div>
            <div>
                <button type="button" data-modal-target="modalTambah" data-modal-toggle="modalTambah" class="text-white bg-primary hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 mb-2">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex space-x-0 items-center">
            <hr class="border-2 border-primary cursor-pointer w-[155px]">
            <hr class="border-1 border-gray-300 cursor-pointer w-full">
        </div>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-7 gap-4">
            @foreach ($koleksi as $index => $item)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('buku.show', $item->buku->id) }}">
                        <img class="rounded-t-lg" src="{{ $item->buku->foto }}" alt="" />
                    </a>
                    <div class="p-5">
                        @foreach ($item->buku->kategoriBukuRelasi as $kategori)
                        <a href="" class="px-3 py-2 text-xs font-medium text-center text-white bg-secondary rounded-lg">{{ $kategori->kategori->nama_kategori }}</a>
                        @endforeach
                        <p class="mb-3 mt-3 text-sm font-semibold text-gray-500">{{ $item->buku->judul }}</p>
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-sm font-semibold tracking-tight text-gray-900">{{ $item->buku->penulis }}</h5>
                            <div>
                                <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="opsiKoleksi{{ $index }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                </button>
                                <div id="opsiKoleksi{{ $index }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <form action="{{ route('koleksi.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<!-- Modal Tambah -->
<div id="modalTambah" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modalTambah">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('koleksi.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="buku_id" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                        <select name="buku_id" id="buku_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Pilih Buku</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white bg-primary hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
