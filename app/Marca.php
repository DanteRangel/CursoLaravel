<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='Marca';
    protected $fillable=['nombre','descripcion'];
    protected $hidden=[];

    public function productos(){
    	$this->hasMany('Cotizador\Producto','id_marca','id');
    }
}
