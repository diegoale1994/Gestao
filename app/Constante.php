<?php namespace Gestao;

use Illuminate\Database\Eloquent\Model;

class Constante extends Model {

protected $table ="constante";
protected $fillable = ['id','valor'];
}
