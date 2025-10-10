<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    protected $table = 'arsip_surat'; // ← jika Anda ganti nama tabel

    protected $fillable = [
        'surat_keluar_id', // ← ini sudah benar
        'kategori',
        'catatan',
    ];

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }
}