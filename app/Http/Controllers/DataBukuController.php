<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use PDF;

class DataBukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('created_at', 'desc')->paginate(5);
        $kategori = Kategori::all();
        $nomor = ($buku->currentPage() - 1) * $buku->perPage() + 1;
        return view('admin.buku', compact('buku', 'kategori', 'nomor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'image|nullable|mimes:png,jpg,gif|max:2048',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required',
        ]);

        if($request->has('foto')){

            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();

            $filename = $extension;

            $path = 'img/';
            $file->move($path, $filename);
        }

        Buku::create([
            'judul' => $request->judul,
            'foto' => $path.$filename,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok'     => $request->stok,
        ]);

        return redirect()->route('dataBuku.index')->with(['success' => 'Buku berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'image|nullable|mimes:png,jpg,gif|max:2048',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required',
        ]);

        $buku = Buku::findOrFail($id);

        if ($request->has('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $path = 'img/';
            $file->move($path, $filename);

            if ($buku->foto) {
                unlink(public_path($buku->foto));
            }

            $buku->update([
                'judul' => $request->judul,
                'foto' => $path.$filename,
                'kategori_id' => $request->kategori_id,
                'deskripsi' => $request->deskripsi,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'stok' => $request->stok,
            ]);
        } else {
            $buku->update([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'deskripsi' => $request->deskripsi,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'stok' => $request->stok,
            ]);
        }

        return redirect()->route('dataBuku.index')->with(['success' => 'Buku berhasil diubah']);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->foto) {
            unlink(public_path($buku->foto));
        }

        $buku->delete();

        return redirect()->route('dataBuku.index')->with(['success' => 'Buku berhasil dihapus']);
    }

    public function bukuPDF()
    {
        $buku = Buku::all();
        $pdf = PDF::loadView('admin.pdf.buku', compact('buku'));
        return $pdf->stream('Data Buku ' . now()->format('d-m-Y'));
    }
}
