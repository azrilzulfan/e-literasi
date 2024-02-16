<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksi = Koleksi::where('users_id', Auth::user()->id)->get();
        $buku = Buku::whereHas('peminjaman', function($query) {
            $query->where('users_id', Auth::user()->id);
        })->get();
        return view('user.koleksi', compact('koleksi', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required'
        ]);

        Koleksi::create([
            'users_id' => Auth::user()->id,
            'buku_id' => $request->buku_id
        ]);

        return redirect()->route('koleksi.index');
    }

    public function destroy($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        $koleksi->delete();

        return redirect()->route('koleksi.index');
    }
}
