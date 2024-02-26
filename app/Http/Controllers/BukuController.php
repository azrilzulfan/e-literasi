<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function show($slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $ulasan = Ulasan::where('buku_id', $buku->id)->latest()->get();
        $avg = Ulasan::where('buku_id', $buku->id)->avg('rating');
        return view('user.buku', compact('buku', 'ulasan', 'avg'));
    }

    public function showRandom()
    {
        $randomBuku = Buku::inRandomOrder()->first();
        return redirect()->route('buku.show', $randomBuku->slug);
    }

    public function ulasanStore(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'ulasan' => 'string',
            'rating' => 'required|numeric',
        ]);

        Ulasan::create([
            'buku_id' => $request->buku_id,
            'users_id' => Auth::user()->id,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with(['success' => 'Ulasan berhasil ditambahkan']);
    }

    public function ulasanDestroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->back()->with(['success' => 'Ulasan berhasil dihapus']);
    }
}
