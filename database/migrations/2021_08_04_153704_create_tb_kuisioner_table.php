<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKuisionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kuisioner', function (Blueprint $table) {
            $table->bigIncrements('id_kuis');
            $table->string('pertanyaan');
            $table->integer('id_kategori');
            $table->string('kode_kuis');
            $table->string('pilihanA');
            $table->string('pilihanB');
            $table->string('pilihanC');
            $table->string('pilihanD');
            $table->string('pilihanE');
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
        Schema::dropIfExists('tb_kuisioner');
    }
}
