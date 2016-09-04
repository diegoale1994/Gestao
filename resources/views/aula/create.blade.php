@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
{!!Form::open(['route'=>'admin.aula.store', 'method'=>'POST'])!!}

	<div class="form-group">
		{!!Form::label('nombre','Codigo de Aula:')!!}
		{!!Form::text('id_aula',null,['class'=>'form-control','placeholder'=>'ejem: XXB187','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre_aula','Nombre de la aula:')!!}
		{!!Form::text('nombre_aula',null,['class'=>'form-control','placeholder'=>'Ejem: Sala I','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_personas','Cantidad de personas:')!!}
		{!!Form::number('cant_personas',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_equipos','Cantidad de equipos:')!!}
		{!!Form::number('cant_equipos',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('aula_piso','Piso:')!!}
		{!!Form::number('aula_piso',null,['class'=>'form-control','min'=>'1','max'=>'2','required'])!!}
	</div>
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</div>
@stop
