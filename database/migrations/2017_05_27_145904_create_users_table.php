<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->string('telefono',20);
            $table->text('direccion_postal');
            $table->integer('id_empresa')->unsigned();
            $table->integer('tipo_usuario')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('Empresa');
            $table->foreign('tipo_usuario')->references('id')->on('Tipo_Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario');
    }
}
