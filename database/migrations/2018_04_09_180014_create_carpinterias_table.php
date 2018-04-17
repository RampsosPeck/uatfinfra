<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpinteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpinterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codi_carp')->unique();
            $table->unsignedInteger('serv_id');
            $table->string('descripcion');
            $table->unsignedInteger('user_id');
            $table->string('fecha');
            $table->boolean('active')->default(true)->nullable();
            $table->string('responsable');
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
        Schema::dropIfExists('carpinterias');
    }
}
