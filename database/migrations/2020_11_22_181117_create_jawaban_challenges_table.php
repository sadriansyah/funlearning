<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_challenges', function (Blueprint $table) {
            $table->id();
            $table->integer('id_challenge');
            $table->integer('id_user');
            $table->string('jawaban_challenge');
            $table->string('penilaian');
            $table->integer('hadiah_poin');
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
        Schema::dropIfExists('jawaban_challenges');
    }
}
