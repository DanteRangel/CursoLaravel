<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='Producto';
    protected $fillable=['sku','descripcion','nombre','costo','precio','img','stock','id_marca'];


    protected $hidden=[];
    public $timestamps=false;

    public function marca(){
    	$this->belongsTo('Cotizador\Marca','id_marca');
    }
}
