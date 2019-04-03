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
            $table->integer('destino3')->nullable();
            $table->string('kilo3')->nullable();
            $table->integer('destino4')->nullable();
            $table->string('kilo4')->nullable();
            $table->integer('destino5')->nullable();
            $table->string('kilo5')->nullable();
            $table->integer('destino6')->nullable();
            $table->string('kilo6')->nullable();
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
