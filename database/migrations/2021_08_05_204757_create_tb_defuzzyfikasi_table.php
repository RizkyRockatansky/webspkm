<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDefuzzyfikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_defuzzyfikasi', function (Blueprint $table) {
            $table->bigIncrements('id_defuzzy');
            $table->integer('id_fuzzy');
            $table->string('harapan');
            $table->string('persepsi');
            $table->string('gap');
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
        Schema::dropIfExists('tb_defuzzyfikasi');
    }
}
