<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'petugas')->paginate(10);
        $nomor = ($petugas->currentPage() - 1) * $petugas->perPage() + 1;
        return view('admin.petugas', compact('petugas','nomor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
        ]);

        return redirect()->route('petugas.index')->with(['success' => 'Petugas berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('petugas.index')->with(['success' => 'Petugas berhasil diubah']);
    }

    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with(['success' => 'Petugas berhasil dihapus']);
    }
}
