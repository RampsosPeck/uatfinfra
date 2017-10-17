<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('placa')->unique();
            $table->string('color')->nullable();
            $table->string('pasajeros')->nullable();
            $table->string('modelo')->nullable();
            $table->string('especificacion')->nullable();
            $table->float('kilometraje')->nullable();
            $table->string('marca')->nullable();
            $table->string('chasis')->unique()->nullable();
            $table->string('motor')->unique()->nullable();
            $table->string('cilindrada')->nullable();
            $table->enum('estado',['ÓPTIMO','MANTENIMIENTO','DESUSO']);
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('vehiculos');
    }
}
