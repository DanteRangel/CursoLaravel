<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCotizacionProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cotizacion_Productos', function (Blueprint $table) {
            $table->integer('id_cotizacion')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->primary(['id_producto','id_cotizacion']);
            $table->foreign('id_producto')->references('id')->on('Producto');
            $table->foreign('id_cotizacion')->references('id')->on('Cotizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cotizacion_Productos');
    }
}
