<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepada_surat', function (Blueprint $table) {
            $table->foreign(['pegawai_id'], 'pegawai_id')->references(['id'])->on('pegawai')->onDelete('CASCADE');
            $table->foreign(['surat_id'], 'surat_id')->references(['id'])->on('surat_keluar')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kepada_surat', function (Blueprint $table) {
            $table->dropForeign('pegawai_id');
            $table->dropForeign('surat_id');
        });
    }
};
