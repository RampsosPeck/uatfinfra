<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seccion')->nullable();
            $table->unsignedInteger('sol_id')->nullable();
            $table->string('serial')->nullable();
            $table->date('fecha');
            $table->string('cantidad');
            $table->string('nombre')->nullable();
            $table->string('detalle'); 
            $table->string('estado')->default('ENVIADO')->nullable();
            $table->string('comentario',500)->nullable(); 
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
        Schema::dropIfExists('devoluciones');
    }
}
