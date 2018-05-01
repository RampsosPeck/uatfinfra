<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coding');
            $table->unsignedInteger('serv_id');
            $table->string('seccion');
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
