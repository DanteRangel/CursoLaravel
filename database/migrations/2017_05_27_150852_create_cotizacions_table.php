<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('clave',45);
            $table->boolean('status');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('Usuario');
            $table->foreign('id_cliente')->references('id')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cotizacion');
    }
}
