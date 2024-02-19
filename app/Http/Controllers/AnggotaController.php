<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'user')->paginate(10);
        $nomor = ($anggota->currentPage() - 1) * $anggota->perPage() + 1;
        return view('admin.anggota', compact('anggota','nomor'));
    }
}
