<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $ulasan = Ulasan::where('buku_id', $buku->id)->latest()->paginate(5);
        $avg = Ulasan::where('buku_id', $buku->id)->avg('rating');
        return view('user.buku', compact('buku','ulasan','avg'));
    }

    public function showRandom()
    {
        $randomBuku = Buku::inRandomOrder()->first();
        return redirect()->route('buku.show', $randomBuku->id);
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

        return redirect()->back();
    }

    public function ulasanDestroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->back();
    }
}
