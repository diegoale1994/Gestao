<?php

namespace Gestao;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table ="clase";
	protected $fillable = ['id','nombre','creditos','semestre','cant_estudiantes','requerimientos'];
}