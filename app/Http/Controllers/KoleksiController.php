<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
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
        $peminjaman = Peminjaman::where('users_id', Auth::user()->id)->get();
        return view('user.koleksi', compact('koleksi', 'buku', 'peminjaman'));
    }

    public function destroy($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        $peminjaman = Peminjaman::where('buku_id', $koleksi->buku_id)->get();

        foreach ($peminjaman as $peminjaman) {
            $peminjaman->delete();

            $buku = Buku::find($peminjaman->buku_id);
            $buku->stok = $buku->stok + 1;
            $buku->save();
        }

        $koleksi->delete();

        return redirect()->route('koleksi.index')->with(['success' => 'Koleksi dan Peminjaman Buku berhasil dihapus']);
    }

}
