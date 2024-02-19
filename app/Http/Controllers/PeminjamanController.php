<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::paginate(10);
        $nomor = ($peminjaman->currentPage() - 1) * $peminjaman->perPage() + 1;
        return view('admin.peminjaman', compact('peminjaman','nomor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);

        $buku = Buku::find($request->buku_id);

        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'users_id' => Auth::user()->id,
            'tgl_peminjaman' => now(),
            'status_peminjaman' => 'N'
        ]);

        $buku->stok = $buku->stok - 1;
        $buku->save();

        return redirect()->back()->with(['success' => 'Buku berhasil dipinjam']);
    }

    public function update($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->tgl_pengembalian = now();
        $peminjaman->update(['status_peminjaman' => 'Y']);

        $buku = Buku::find($peminjaman->buku_id);
        $buku->stok = $buku->stok + 1;
        $buku->save();

        return redirect()->route('peminjaman.index')->with(['success' => 'Buku berhasil dikembalikkan']);
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with(['success' => 'Peminjaman berhasil dihapus']);
    }

    public function peminjamanPDF()
    {
        $peminjaman = Peminjaman::all();
        $pdf = PDF::loadView('admin.pdf.peminjaman', compact('peminjaman'));
        return $pdf->stream('Data Peminjaman Buku ' . now()->format('d-m-Y'));
    }
}
