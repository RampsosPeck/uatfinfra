<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destino1');
            $table->string('kilo1');
            $table->integer('destino2');
            $table->string('kilo2');
            $table->integer('destino3');
            $table->string('kilo3');
            $table->integer('destino4');
            $table->string('kilo4');
            $table->integer('destino5');
            $table->string('kilo5');
            $table->integer('destino6');
            $table->string('kilo6');
            $table->string('adicional');
            $table->string('totalkm');
            $table->unsignedInteger('viaje_id');
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
        Schema::dropIfExists('rutas');
    }
}
