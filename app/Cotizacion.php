<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table='Cotizacion';
    public $fillable=['fecha','clave','status','id_usuario','id_cliente'];

  public $timestamps =false;
    public function cliente(){
    	return $this->belongsTo('Cotizador\User','id_cliente','id');
    }
    public function usuario(){
    	return $this->belongsTo('Cotizador\User','id_usuario','id');
    }

    public function productos(){
    	return $this->belongsToMany('Cotizador\Producto','Cotizacion_Productos','id_cotizacion','id_producto');
    	//->withPivot('nota','no_productos','subtotal');
    }

}
