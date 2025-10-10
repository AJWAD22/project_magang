<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar'; // ← jika Anda ganti nama tabel

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tujuan',
        'perihal',
        'file_path',
    ];

    public function arsipSurat()
    {
        return $this->hasOne(ArsipSurat::class);
    }
}