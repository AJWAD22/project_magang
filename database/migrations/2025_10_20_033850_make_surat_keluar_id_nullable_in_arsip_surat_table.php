<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSuratKeluarIdNullableInArsipSuratTable extends Migration
{
    public function up()
    {
        Schema::table('arsip_surat', function (Blueprint $table) {
            $table->unsignedBigInteger('surat_keluar_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('arsip_surat', function (Blueprint $table) {
            $table->unsignedBigInteger('surat_keluar_id')->nullable(false)->change();
        });
    }
}