<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbHasilKuisionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hasil_kuisioner', function (Blueprint $table) {
            $table->bigIncrements('id_hasil');
            $table->integer('id_mhs');
            $table->integer('id_periode');
            $table->integer('id_kuis');
            $table->string('jawaban_persepsi');
            $table->string('jawaban_harapan');
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
        Schema::dropIfExists('tb_hasil_kuisioner');
    }
}
