<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Admin default
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('12345'), // ganti sesuai kebutuhan
            ]
        );

        // Akun User biasa (opsional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Contoh data Surat Masuk
        SuratMasuk::insert([
            [
                'nomor_surat' => 'SM-001/2025',
                'tanggal_surat' => '2025-08-01',
                'pengirim' => 'Dinas Pendidikan',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Rapat koordinasi tahunan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => 'SM-002/2025',
                'tanggal_surat' => '2025-08-05',
                'pengirim' => 'Dinas Kesehatan',
                'perihal' => 'Sosialisasi Program',
                'keterangan' => 'Sosialisasi program kesehatan masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Contoh data Surat Keluar
        SuratKeluar::insert([
            [
                'nomor_surat' => 'SK-001/2025',
                'tanggal_surat' => '2025-08-02',
                'tujuan' => 'Bupati Kabupaten X',
                'perihal' => 'Laporan Tahunan',
                'keterangan' => 'Laporan kegiatan tahun 2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => 'SK-002/2025',
                'tanggal_surat' => '2025-08-06',
                'tujuan' => 'Kepala Dinas Pendidikan',
                'perihal' => 'Permohonan Izin',
                'keterangan' => 'Permohonan izin kegiatan pelatihan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
