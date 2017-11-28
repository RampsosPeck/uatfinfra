<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('litro1');
            $table->string('compra1');
            $table->string('litro2');
            $table->string('compra2');
            $table->string('litro3');
            $table->string('compra3');
            $table->string('totallitro');
            $table->string('totalbs');
            $table->string('peaje');
            $table->string('imprevisto');
            $table->string('descripcion');
            $table->string('debocombu');
            $table->string('debopeaje');
            $table->string('deboimprevi');
            $table->string('debototal');
            $table->string('viaticos');
            $table->string('kmpartida');
            $table->string('kmllegada');
            $table->mediumText('informe');
            $table->mediumText('recomendacion');
            $table->string('pasajeros');
            $table->string('dias');
            $table->timestamp('fecha_inicial')->nullable();
            $table->timestamp('fecha_final')->nullable();
            $table->time('horainicial');
            $table->time('horafinal');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('vehiculo_id');
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
        Schema::dropIfExists('informes');
    }
}
