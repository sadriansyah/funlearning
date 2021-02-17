<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas');
            $table->string('judul_reward');
            $table->string('deskripsi_reward');
            $table->string('hidden_reward');
            $table->integer('batasan_klaim');
            $table->string('id_file');
            $table->string('id_trigger');
            $table->string('tipe');
            $table->integer('minimum_level');
            $table->integer('poin_reward');
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
        Schema::dropIfExists('rewards');
    }
}
