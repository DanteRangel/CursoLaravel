<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='Producto';
    public $fillable=['nombre','descripcion','costo','precio','stock','id_marca','id_grupo','img'];
    
  public $timestamps =false;

    public function marca(){
    	return $this->belongsTo('Cotizador\Marca','id_marca','id');
    }
    public function grupo(){
    	return $this->belongsTo('Cotizador\Grupo','id_grupo','id');	
    }
    public function cotizaciones(){
    	    	return $this->belongsToMany('Cotizador\Cotizacion','Cotizacion_Productos','id_producto','id_cotizacion');
    }
}
