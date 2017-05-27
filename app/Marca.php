<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='Marca';
    public $fillable=['nombre','descripcion'];
    
  public $timestamps =false;

    public function productos(){
    	return $this->hasMany('Cotizador\Producto','id_marca','id');
    }
}
