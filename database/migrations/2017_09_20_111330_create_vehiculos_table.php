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
            $table->string('type');
            $table->string('placa');
            $table->string('color');
            $table->string('passengers');
            $table->string('model');
            $table->string('especification');
            $table->float('mileage');
            $table->string('brand');
            $table->string('chassis');
            $table->string('motor');
            $table->string('cilindrada');
            $table->string('combu');
            $table->enum('estado',['optimo','mantenimiento','desuso']);
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
