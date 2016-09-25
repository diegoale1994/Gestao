<?php

namespace Gestao;

use Illuminate\Database\Eloquent\Model;

class ClaseAulaHorario extends Model
{
	public $timestamps = false;
    protected $table ="clase_aula_horario";
	protected $fillable = ['id_clase','id_aula','hora_inicio','hora_final','fecha','observaciones','id_persona'];
}
