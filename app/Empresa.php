<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='Empresa';
    //protected $connection='otra';
    public $fillable=['id','nombre','razon_social'];
    public $hidden=[];
    
  public $timestamps =false;

    public function direcciones(){
    	return $this->hasMany('Cotizador\Direccion','id_empresa','id');
    }
    public function usuarios(){
    	return $this->hasMany('Cotizador\User','id_empresa','id');
    }
}
