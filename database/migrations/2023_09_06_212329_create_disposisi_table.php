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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('kepada');
            $table->date('tenggat');
            $table->text('disposisi_kbnn');
            $table->text('disposisi_kabid')->nullable();
            $table->bigInteger('status');
            $table->bigInteger('surat_id');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('disposisi');
    }
};
