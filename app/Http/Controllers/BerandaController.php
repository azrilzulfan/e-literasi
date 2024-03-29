<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $buku = Buku::all();
        $bukuTerbaru = Buku::latest()->take(2)->get();
        $randomBuku = Buku::inRandomOrder()->first();
        $kategori = Kategori::all();
        $averages = [];

        foreach ($buku as $bukuItem) {
            $avg = Ulasan::where('buku_id', $bukuItem->id)->avg('rating');
            $averages[$bukuItem->id] = $avg;
        }

        if ($query) {
            $buku = Buku::query()
                ->where('judul', 'LIKE', "%{$query}%")
                ->orWhere('penulis', 'LIKE', "%{$query}%")
                ->orWhere('penerbit', 'LIKE', "%{$query}%")
                ->orWhere('tahun_terbit', 'LIKE', "%{$query}%")
                ->orWhereHas('kategori', function($kategoriQuery) use ($query) {
                    $kategoriQuery->where('nama_kategori', 'LIKE', "%{$query}%");
                })
                ->get();
        }

        return view('user.beranda', compact('buku', 'bukuTerbaru', 'randomBuku', 'averages', 'kategori'));
    }
}
