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
            $table->string('tipo');
            $table->string('entidad');
            $table->string('dias');
            $table->integer('pasajeros');
            $table->timestamp('fecha_inicial')->nullable();
            $table->timestamp('fecha_final')->nullable();
            $table->string('horainicial');
            $table->string('horafinal');
            $table->string('categoria');
            $table->mediumText('nota');
            $table->string('recurso');
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
