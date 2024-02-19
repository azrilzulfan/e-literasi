<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use PDF;

class DataBukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(5);
        $nomor = ($buku->currentPage() - 1) * $buku->perPage() + 1;
        return view('admin.buku', compact('buku','nomor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'image|nullable|mimes:png,jpg,gif|max:2048',
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
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'stok' => $request->stok,
            ]);
        } else {
            $buku->update([
                'judul' => $request->judul,
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
