<x-dashboard-layout>
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    <div class="max-w-screen-xl py-10">
        <dl class="grid grid-cols-3 max-w-screen-md gap-10 text-gray-900">
            <div class="flex flex-col items-center bg-gray-100 p-5 shadow rounded-lg">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $buku }}</dt>
                <dd class="text-primary">Buku</dd>
            </div>
            <div class="flex flex-col items-center bg-gray-100 p-5 shadow rounded-lg">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $kategori }}</dt>
                <dd class="text-primary">Kategori</dd>
            </div>
            <div class="flex flex-col items-center bg-gray-100 p-5 shadow rounded-lg">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $peminjaman }}</dt>
                <dd class="text-primary">Peminjaman</dd>
            </div>
            <div class="flex flex-col items-center bg-gray-100 p-5 shadow rounded-lg">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $petugas }}</dt>
                <dd class="text-primary">Petugas</dd>
            </div>
            <div class="flex flex-col items-center bg-gray-100 p-5 shadow rounded-lg">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $anggota }}</dt>
                <dd class="text-primary">Anggota</dd>
            </div>
        </dl>
    </div>
</x-dashboard-layout>
