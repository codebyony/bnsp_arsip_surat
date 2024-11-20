<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arsips')->insert([
            [
                'nomor_surat' => '2022/PD3/TU/001',
                'judul' => 'Nota Dinas WFH',
                'waktu_pengarsipan' => '2023-06-21 17:23:20',
                'file_surat' => 'uploads/W0GcpgmFMbZr.pdf',
                'id_kategori' => 1
            ],
            [
                'nomor_surat' => '2022/PD3/TU/002',
                'judul' => 'Undangan Halal Bi Halal',
                'waktu_pengarsipan' => '2023-04-21 18:23:20',
                'file_surat' => 'uploads/z5D08f9Tg2Iz.pdf',
                'id_kategori' => 2
            ],
        ]);
    }
}
