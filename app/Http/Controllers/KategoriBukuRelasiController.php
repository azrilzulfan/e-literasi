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
        $kategoriBuku = KategoriBukuRelasi::all();
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('admin.kategoriBuku', compact('kategoriBuku','buku','kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ]);

        KategoriBukuRelasi::create($request->all());

        return redirect()->route('kategoriBukuRelasi.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $kategoriBuku = KategoriBukuRelasi::findOrFail($id);
        $kategoriBuku->update($request->all());

        return redirect()->route('kategoriBukuRelasi.index');
    }

    public function destroy($id)
    {
        $kategoriBuku = KategoriBukuRelasi::findOrFail($id);
        $kategoriBuku->delete();

        return redirect()->route('kategoriBukuRelasi.index');
    }
}
