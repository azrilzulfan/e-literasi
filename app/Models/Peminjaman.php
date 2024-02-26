<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'buku_id',
        'users_id',
        'tgl_peminjaman',
        'batas_waktu',
        'tgl_pengembalian',
        'status_peminjaman',
        'denda',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
