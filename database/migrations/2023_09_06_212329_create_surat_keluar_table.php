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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('user_id');
            $table->string('kategori')->nullable();
            $table->string('bidang');
            $table->string('no_surat')->nullable();
            $table->string('type')->nullable();
            $table->string('hal')->nullable();
            $table->integer('sifat')->nullable();
            $table->string('topik')->nullable();
            $table->string('sebagai')->nullable();
            $table->string('kepada')->nullable();
            $table->text('isi')->nullable();
            $table->text('isilain')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->string('tempat')->nullable();
            $table->time('mulai')->nullable();
            $table->time('selesai')->nullable();
            $table->text('menimbang')->nullable();
            $table->text('untuk')->nullable();
            $table->text('dasar')->nullable();
            $table->integer('status')->nullable();
            $table->date('tanggal_surat');
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
        Schema::dropIfExists('surat_keluar');
    }
};
