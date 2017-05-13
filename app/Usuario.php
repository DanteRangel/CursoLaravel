<?php

namespace Cotizador;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //protected $primaryKey="id_usuario";
    protected $table="Usuario";
    protected $fillable=["correo","nombre","telefono","password"];

    protected $hidden=["password"];
    public $timestamps=false;
}
