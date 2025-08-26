<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuratMasuk;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuratMasuk::create([
            'nomor_surat'   => '001/SM/VIII/2025',
            'pengirim'      => 'Dinas Pendidikan',
            'perihal'       => 'Undangan Rapat Koordinasi',
            'tanggal_masuk' => '2025-08-01',
            'keterangan'    => 'Rapat akan dilaksanakan di Aula Utama',
        ]);

        SuratMasuk::create([
            'nomor_surat'   => '002/SM/VIII/2025',
            'pengirim'      => 'Kementerian Kesehatan',
            'perihal'       => 'Sosialisasi Program Baru',
            'tanggal_masuk' => '2025-08-05',
            'keterangan'    => 'Harap mengirim perwakilan',
        ]);

        SuratMasuk::create([
            'nomor_surat'   => '003/SM/VIII/2025',
            'pengirim'      => 'Universitas Banjarmasin',
            'perihal'       => 'Kerja Sama Magang',
            'tanggal_masuk' => '2025-08-10',
            'keterangan'    => 'Proposal kerja sama terlampir',
        ]);
    }
}
