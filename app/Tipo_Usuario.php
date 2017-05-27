<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    protected $table='Tipo_Usuario';
    public $fillable=['nombre'];

  public $timestamps =false;
    public function usuarios(){
    	return $this->hasMany('Cotizador\User','tipo_usuario','id');
    }


}
