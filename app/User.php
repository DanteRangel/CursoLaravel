<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='Usuario';
    public $fillable=['nombre','correo','telefono','tipo_usuario','id_empresa'];
    public $hidden=['password','remember_token'];
    
  public $timestamps =false;
    public function empresa(){
    	return $this->belongsTo('Cotizador\Empresa','id_empresa','id');
    }
    public function permiso(){
    	return $this->belongsTo('Cotizador\Tipo_Usuario','tipo_usuario','id');
    }
    public function cotizaciones(){

    	return $this->hasMany('Cotizador\Cotizacion','id_usuario','id');
    }

}
