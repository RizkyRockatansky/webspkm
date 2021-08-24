<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbFuzzyfikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_fuzzyfikasi', function (Blueprint $table) {
            $table->bigIncrements('id_fuzzy');
            $table->integer('id_hasil');
            $table->integer('batasBawahHarapan');
            $table->integer('batasTengahHarapan');
            $table->integer('batasAtasHarapan');
            $table->integer('batasBawahPersepsi');
            $table->integer('batasTengahPersepsi');
            $table->integer('batasAtasPersepsi');
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
        Schema::dropIfExists('tb_fuzzyfikasi');
    }
}
