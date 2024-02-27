<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insertKategori = [
            [ 'nama_kategori' => 'Novel', 'created_at' => now(), 'updated_at' => now() ],
            [ 'nama_kategori' => 'Komik', 'created_at' => now(), 'updated_at' => now() ],
            [ 'nama_kategori' => 'Pendidikan', 'created_at' => now(), 'updated_at' => now() ],
            [ 'nama_kategori' => 'Bisnis & Ekonomi', 'created_at' => now(), 'updated_at' => now() ],
            [ 'nama_kategori' => 'Sejarah', 'created_at' => now(), 'updated_at' => now() ],
        ];

        DB::table('kategori')->insert($insertKategori);
    }
}
