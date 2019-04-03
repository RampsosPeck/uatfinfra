<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMecanicos extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('mecanicos', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('sol_id');
			$table->string('kilome')->nullable();
			$table->date('fecha');
			$table->string('cantidad')->nullable();
			$table->string('nombre')->nullable();
			$table->string('descripcion', 800);
			$table->string('marca')->nullable();
			$table->string('codigo')->nullable();
			$table->string('observacion', 700)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('mecanicos');
	}
}
