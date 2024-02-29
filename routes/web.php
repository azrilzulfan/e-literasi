<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Data Buku
        Route::get('/dashboard/buku', [DataBukuController::class, 'index'])->name('dataBuku.index');
        Route::post('/dashboard/buku', [DataBukuController::class, 'store'])->name('dataBuku.store');
        Route::put('/dashboard/buku/{id}', [DataBukuController::class, 'update'])->name('dataBuku.update');
        Route::delete('/dashboard/buku/{id}', [DataBukuController::class, 'destroy'])->name('dataBuku.destroy');
        Route::get('/dashboard/buku/pdf', [DataBukuController::class, 'bukuPDF'])->name('dataBuku.pdf');
        // Kategori
        Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/dashboard/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::put('/dashboard/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/dashboard/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        // Peminjaman
        Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::put('/dashboard/peminjaman/batasWaktu/{id}', [PeminjamanController::class, 'updateBatasWaktu'])->name('peminjaman.batasWaktu');
        Route::put('/dashboard/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::delete('/dashboard/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
        Route::get('/dashboard/peminjaman/pdf', [PeminjamanController::class, 'peminjamanPDF'])->name('peminjaman.pdf');
        // Anggota
        Route::get('/dashboard/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    });
    Route::middleware(['role:admin'])->group(function () {});
        // Petugas
        Route::get('/dashboard/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::post('/dashboard/petugas', [PetugasController::class, 'store'])->name('petugas.store');
        Route::put('/dashboard/petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/dashboard/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    Route::middleware(['role:user'])->group(function () {
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
        Route::get('/buku/{slug}', [BukuController::class, 'show'])->name('buku.show');
        Route::get('/buku', [BukuController::class, 'showRandom'])->name('buku.random');
        // Peminjaman
        Route::post('/buku/{id}/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        // Ulasan
        Route::post('/buku/{id}/ulasan', [BukuController::class, 'ulasanStore'])->name('buku.ulasanStore');
        Route::delete('/buku/{id}/ulasan', [BukuController::class, 'ulasanDestroy'])->name('buku.ulasanDestroy');
        // Koleksi
        Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
        Route::post('/koleksi', [KoleksiController::class, 'store'])->name('koleksi.store');
        Route::delete('/koleksi/{id}', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');
    });
});

require __DIR__.'/auth.php';
