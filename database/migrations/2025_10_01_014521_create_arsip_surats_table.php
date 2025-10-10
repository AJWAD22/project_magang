<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keluar_id')->constrained()->onDelete('cascade');
            $table->string('kategori');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arsip_surats');
    }
};