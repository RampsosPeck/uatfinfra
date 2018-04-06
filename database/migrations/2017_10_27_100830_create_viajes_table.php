<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->unsignedInteger('encargado_id');
            $table->string('tipo');
            $table->string('entidad');
            $table->string('dias');
            $table->integer('pasajeros');
            $table->timestamp('fecha_inicial')->nullable();
            $table->timestamp('fecha_final')->nullable();
            $table->time('horainicial');
            $table->time('horafinal');

            $table->timestamp('fecha_inicial2')->nullable();
            $table->timestamp('fecha_final2')->nullable();
            $table->time('horainicial2')->nullable();
            $table->time('horafinal2')->nullable();

            $table->mediumText('nota');
            $table->string('recurso');
            $table->string('estado');
            $table->unsignedInteger('vehiculo_id');
            $table->unsignedInteger('reserva_id')->nullable();
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
        Schema::dropIfExists('viajes');
    }
}
