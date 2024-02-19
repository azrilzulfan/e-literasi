<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KategoriBukuRelasi;
use Illuminate\Http\Request;

class KategoriBukuRelasiController extends Controller
{
    public function index()
    {
        $kategoriBuku = KategoriBukuRelasi::paginate(10);
        $buku = Buku::all();
        $kategori = Kategori::all();
        $nomor = ($kategoriBuku->currentPage() - 1) * $kategoriBuku->perPage() + 1;
        return view('admin.kategoriBuku', compact('kategoriBuku','buku','kategori','nomor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ]);

        KategoriBukuRelasi::create($request->all());

        return redirect()->route('kategoriBukuRelasi.index')->with(['success' => 'Kategori Buku berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $kategoriBuku = KategoriBukuRelasi::findOrFail($id);
        $kategoriBuku->update($request->all());

        return redirect()->route('kategoriBukuRelasi.index')->with(['success' => 'Kategori Buku berhasil diubah']);
    }

    public function destroy($id)
    {
        $kategoriBuku = KategoriBukuRelasi::findOrFail($id);
        $kategoriBuku->delete();

        return redirect()->route('kategoriBukuRelasi.index')->with(['success' => 'Kategori Buku berhasil dihapus']);
    }
}
