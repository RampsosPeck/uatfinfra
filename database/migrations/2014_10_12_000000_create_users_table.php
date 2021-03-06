<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *ATENCION lo puse al campo password nullable y cedula
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->string('cedula')->nullable();
            $table->integer('celular')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->boolean('active')->default(false)->nullable();
            $table->string('type')->nullable();
            $table->string('position')->nullable();
            $table->string('entidad')->nullable();
            $table->integer('grade')->nullable(); 
            $table->string('insertador')->nullable(); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
