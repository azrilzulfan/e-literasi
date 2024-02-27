<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KategoriBukuRelasi;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = Buku::count();
        $kategori = Kategori::count();
        $peminjaman = Peminjaman::count();
        $petugas = User::where('role', 'petugas')->count();
        $anggota = User::where('role', 'user')->count();

        return view('admin.dashboard')->with([
            'buku' => $buku,
            'kategori' => $kategori,
            'peminjaman' => $peminjaman,
            'petugas' => $petugas,
            'anggota' => $anggota
        ]);
    }
}
