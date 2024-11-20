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
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'Pengumuman',
                'keterangan' => 'Surat-surat yang terkait dengan pengumuman',
            ],
            [
                'nama_kategori' => 'Undangan',
                'keterangan' => 'Undangan rapat, koordinasi, dsb.',
            ],
            [
                'nama_kategori' => 'Nota Dinas',
                'keterangan' => 'Surat yang sifatnya internal dan berisi komunikasi dinas',
            ],
            [
                'nama_kategori' => 'Pemberitahuan',
                'keterangan' => 'Informasi tertulis mengenai sesuatu yang akan terjadi',
            ],
        ]);
    }
}
