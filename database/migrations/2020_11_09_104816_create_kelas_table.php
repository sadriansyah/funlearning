<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('cover_kelas');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->string('id_dosen');
            $table->string('kode_kelas');
            $table->integer('komposisi_tugas');
            $table->integer('komposisi_quis');
            $table->integer('komposisi_ets');
            $table->integer('komposisi_eas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
