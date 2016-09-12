<?php

namespace Gestao;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table ="programa";
	protected $fillable = ['id','nombre'];
}