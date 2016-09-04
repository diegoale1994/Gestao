<?php namespace Gestao;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model {

protected $table ="aula";
protected $fillable = ['id','nombre','cant_equipos','cant_personas','piso'];
}
