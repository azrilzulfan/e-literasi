<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'slug',
        'foto',
        'kategori_id',
        'deskripsi',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'buku_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'buku_id');
    }
}
