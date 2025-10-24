<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    protected $table = 'arsip_surat'; // ← jika Anda ganti nama tabel

// app/Models/ArsipSurat.php
protected $fillable = [
    'tanggal_arsip',
    'file_path',
    'catatan',
    'surat_keluar_id',
];

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }
}