<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('solicitudes', function (Blueprint $table) {
			$table->increments('id');
			$table->string('solmecodi')->unique();
			$table->unsignedInteger('vehiculo_id');
			$table->unsignedInteger('user_id');
			$table->string('descripcion');
			$table->string('fecha');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('solicitudes');
	}
}
