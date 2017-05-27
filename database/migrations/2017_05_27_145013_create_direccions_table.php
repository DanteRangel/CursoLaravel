<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Direccion', function (Blueprint $table) {
            $table->increments('id');
            $table->text('direccion_postal');
            $table->integer('id_empresa')->unsigned();

            $table->foreign('id_empresa')->references('id')->on('Empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Direccion');
    }
}
