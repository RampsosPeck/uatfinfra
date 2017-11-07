<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('viaje_id');
            $table->string('combustible');
            $table->string('totalcombu');
            $table->string('precio');
            $table->string('totalprecio');
            $table->string('canpeaje')->nullable();
            $table->string('prepeaje')->nullable();
            $table->string('totpeaje')->nullable();
            $table->string('cangaraje')->nullable();
            $table->string('pregaraje')->nullable();
            $table->string('totgaraje')->nullable();
            $table->string('nommante')->nullable();
            $table->string('canmante')->nullable();
            $table->string('premante')->nullable();
            $table->string('totmante')->nullable();
            $table->string('canviaciu')->nullable();
            $table->string('previaciu')->nullable();
            $table->string('totviaciu')->nullable();
            $table->string('canviapro')->nullable();
            $table->string('previapro')->nullable();
            $table->string('totviapro')->nullable();
            $table->string('canviafro')->nullable();
            $table->string('previafro')->nullable();
            $table->string('totviafro')->nullable();
            $table->string('totprebol');
            $table->string('ruta1')->nullable();
            $table->string('cantidad1')->nullable();
            $table->string('precio1')->nullable();
            $table->string('total1')->nullable();
            $table->string('ruta2')->nullable();
            $table->string('cantidad2')->nullable();
            $table->string('precio2')->nullable();
            $table->string('total2')->nullable();
            $table->string('vueltas')->nullable();
            $table->string('preciovuelta')->nullable();
            $table->string('totalvuelta')->nullable();
            $table->string('totalpublico');
            $table->string('totaldiferencia');
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
        Schema::dropIfExists('presupuestos');
    }
}
