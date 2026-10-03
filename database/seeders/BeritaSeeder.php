<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Berita::create([
            'judul' => 'Turnamen Voli Antar Dusun Resmi Dibuka',
            'kategori' => 'Olahraga',
            'isi' => 'Turnamen voli tahunan antar dusun resmi dibuka oleh kepala desa...',
            'penulis' => 'Admin',
        ]);
        Berita::create([
            'judul' => 'Sosialisasi Bank Sampah untuk Warga',
            'kategori' => 'Pendidikan',
            'isi' => 'Pemerintah desa mengadakan sosialisasi pengelolaan sampah...',
            'penulis' => 'Admin',
        ]);
        Berita::create([
            'judul' => 'Panen Raya Kelompok Wanita Tani',
            'kategori' => 'Potensi',
            'isi' => 'Kelompok wanita tani desa berhasil panen sayuran organik...',
            'penulis' => 'Admin',
        ]);
    }
}
