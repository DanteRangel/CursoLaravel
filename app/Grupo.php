<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table='Grupo';
    public $fillable=['nombre'];
    
  public $timestamps =false;
    public function productos(){
    	return $this->hasMany('Cotizador\Producto','id_grupo','id');
    }
}
