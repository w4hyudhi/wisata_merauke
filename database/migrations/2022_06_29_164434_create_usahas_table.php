<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wisata_id');
            $table->unsignedBigInteger('pedagang_id');
            $table->string('nama');
            $table->string('jenis');
            $table->text('keterangan');
            $table->string('foto');
            $table->string('tanggal');
            $table->timestamps();
            $table->foreign('wisata_id')->references('id')->on('wisatas')->onDelete('cascade');
            $table->foreign('pedagang_id')->references('id')->on('pedagangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usahas');
    }
}
