<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar'; // ← jika Anda ganti nama tabel

  // app/Models/SuratKeluar.php
protected $fillable = [
    'nomor_unit',
    'nomor_berkas',
    'alamat_penerima',
    'tanggal_surat',
    'perihal',
    'nomor_petunjuk',
    'nomor_paket',
];

    public function arsipSurat()
    {
        return $this->hasOne(ArsipSurat::class);
    }
}