<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->date('tanggal_surat')->after('nomor_berkas');
            $table->text('alamat_penerima')->after('tanggal_surat');
            $table->string('perihal')->after('alamat_penerima');
            $table->string('tujuan')->nullable()->after('perihal'); // sekarang 'perihal' sudah ditambahkan di atas
            $table->string('nomor_petunjuk')->nullable()->after('tujuan');
            $table->string('nomor_paket')->nullable()->after('nomor_petunjuk');
        });
    }
};
