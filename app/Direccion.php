<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public $table='Direccion';
    public $fillable=['direccion_postal','id_empresa','longitud','latitud'];

  public $timestamps =false;
    public function empresa(){
    	return $this->belongsTo('Cotizador\Empresa','id_empresa','id');
    }
}
