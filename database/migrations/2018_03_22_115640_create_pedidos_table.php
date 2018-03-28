<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sol_id');
            $table->integer('kilome')->nullable();
            $table->string('idh')->nullable();
            $table->string('justificacion')->nullable();
            $table->string('observacion')->nullable();
            $table->integer('cant1')->nullable(); 
            $table->string('med1')->nullable();
            $table->integer('cant2')->nullable();
            $table->string('med2')->nullable();
            $table->integer('cant3')->nullable();
            $table->string('med3')->nullable();
            $table->integer('cant4')->nullable();
            $table->string('med4')->nullable();
            $table->integer('cant5')->nullable();
            $table->string('med5')->nullable();
            $table->integer('cant6')->nullable();
            $table->string('med6')->nullable();
            $table->integer('cant7')->nullable();
            $table->string('med7')->nullable();
            $table->integer('cant8')->nullable();
            $table->string('med8')->nullable();
            $table->integer('cant9')->nullable();
            $table->string('med9')->nullable();
            $table->integer('cant10')->nullable();
            $table->string('med10')->nullable();
            $table->integer('cant11')->nullable();
            $table->string('med11')->nullable();
            $table->string('des1',900)->nullable();
            $table->string('des2',900)->nullable();
            $table->string('des3',900)->nullable();
            $table->string('des4',900)->nullable();
            $table->string('des5',900)->nullable();
            $table->string('des6',900)->nullable();
            $table->string('des7',900)->nullable();
            $table->string('des8',900)->nullable();
            $table->string('des9',900)->nullable();
            $table->string('des10',900)->nullable();
            $table->string('des11',900)->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
