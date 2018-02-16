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
            $table->unsignedInteger('viaje_id');
            $table->unsignedInteger('vehiculo_id');
            $table->unsignedInteger('conductor');
            $table->timestamp('fecha_inicial');
            $table->timestamp('fecha_final');
            $table->time('horainicial');
            $table->time('horafinal');
            $table->string('dias');
            $table->string('pasajeros');
            $table->mediumText('informe');
            $table->mediumText('recomendacion')->nullable();
            $table->string('kmpartida');
            $table->string('kmllegada');
            $table->string('kmtotal')->nullable();
            $table->string('viaticos')->nullable();
            $table->string('litro1')->nullable();
            $table->string('compra1')->nullable();
            $table->string('litro2')->nullable();
            $table->string('compra2')->nullable();
            $table->string('litro3')->nullable();
            $table->string('compra3')->nullable();
            $table->string('totallitro')->nullable();
            $table->string('totalbs')->nullable();
            $table->string('peaje')->nullable();
            $table->string('imprevisto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('debocombu')->nullable();
            $table->string('debopeaje')->nullable();
            $table->string('deboimprevi')->nullable();
            $table->string('debototal')->nullable();
            $table->string('estado')->nullable();
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
