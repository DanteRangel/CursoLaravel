<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('costo');
            $table->float('precio');
            $table->integer('stock');
            $table->text('img');
            $table->integer('id_marca')->unsigned();
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_marca')->references('id')->on('Marca');
            $table->foreign('id_grupo')->references('id')->on('Grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto');
    }
}
