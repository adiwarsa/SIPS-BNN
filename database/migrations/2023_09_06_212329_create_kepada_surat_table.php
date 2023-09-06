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
        Schema::create('kepada_surat', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('surat_id')->index('surat_id');
            $table->bigInteger('pegawai_id')->index('pegawai_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepada_surat');
    }
};
