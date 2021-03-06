@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	

<div class="panel panel-default">
  <div class="panel-body">

<?php 
$clases = array();

foreach ($clase_sin_aula as $element){
 		$clases[$element->id] = $element -> nombre;
 	}
?>
@if (count($clase_sin_aula)<=0)
	<h2>Parece que no hay clases que asignar para este momento!</h2>
@else
{!!Form::open(['route'=>'admin.reserva.store', 'method'=>'POST'])!!}
	{!! Form::hidden('fecha', $fecha )!!}
	{!! Form::hidden('aula', $aula )!!}
	{!! Form::hidden('uri', $uri_anterior )!!}
	{!! Form::hidden('hora_inicio', $hora_inicio )!!}
 	{!! Form::select('clase',$clases,null,['id'=>'tipo_mostrar']) !!}
	{!!Form::submit(trans('messages.asignar'),['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}


  
  @endif
  </div>
  </div>
  <br>
  <div class="panel panel-default">
  <div class="panel-body">
  <h2>Crea Una Clase</h2>
{!!Form::open(['route'=>'admin.reserva.store2', 'method'=>'POST', 'id' => 'form_2'])!!}

<div class="form-group">
		{!!Form::label('id',trans('messages.codigoDeLaClase'))!!}
		{!!Form::text('id',null,['class'=>'form-control','required'])!!}
	</div>
	{!! Form::hidden('uri', $uri_anterior )!!}
	<div class="form-group">
		{!!Form::label('nombre_aula',trans('messages.nombreDeLaClase'))!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>trans('messages.ejemComputacionGrafica'),'required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('grupo',trans('messages.grupo'))!!}
		{!!Form::text('grupo',null,['class'=>'form-control','placeholder'=>trans('messages.ejemSis501')])!!}
	</div>
	{!! Form::hidden('aula', $aula )!!}
	<div class="form-group">
		{!!Form::label('creditos',trans('messages.numeroDeCreditos'))!!}
		{!!Form::number('creditos',null,['class'=>'form-control','min'=>'1','max'=>'5'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('semestre',trans('messages.semestre'))!!}
		{!!Form::number('semestre',null,['class'=>'form-control','min'=>'1','max'=>'12'])!!}
	</div>
	{!! Form::hidden('fecha', $fecha )!!}
	<div class="form-group">
		{!!Form::label('cant_estudiantes',trans('messages.cantidadDeEstudiantes'))!!}
		{!!Form::number('cant_estudiantes',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('requerimientos',trans('messages.requerimientos'))!!}
		{!!Form::text('requerimientos',null,['class'=>'form-control'])!!}
	</div>
	
  
    <div class="form-group">
    	{!!Form::label('horaInicio',trans('messages.horaInicial'))!!}
    	{!!Form::number('horaInicio',$hora_inicio,['class'=>'form-control rese_hora_inicio','min'=>'7','max'=>'21', 'readonly'=>"readonly"])!!}
    </div>
    <div class="form-group">	
    	{!!Form::label('horaFinal',trans('messages.horaFinal'))!!}

    	{!!Form::number('horaFinal',$hora_inicio +1,['class'=>'form-control rese_hora_final','min'=>$hora_inicio +1,'max'=>$hora_inicio + $cont,'required'])!!}
    </div>
    
{!!Form::submit(trans('messages.registrar'),['class'=>'btn btn-primary btn_rese'])!!}
	{!!Form::close()!!}

  </div>
  </div>
</div>

</div>
@stop