<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_ujians', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ujian');
            $table->integer('id_user');
            $table->string('tglsubmit_ujian');
            $table->string('id_file');
            $table->integer('nilai_ujian');
            $table->string('status');
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
        Schema::dropIfExists('jawaban_ujians');
    }
}
