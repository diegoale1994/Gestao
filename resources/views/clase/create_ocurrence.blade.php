@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Clase / Añadir Ocurrencia</li>
	</ol>
</div><br>
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<center>Añadir Ocurrencia</center>
		</div>
		<div class="panel panel-body">
		{!!Form::open(['route'=>'admin.clase.storeocurrence', 'method'=>'POST'])!!}
		{!! Form::hidden('id', $clase) !!}
		@include('clase.forms.clase_ocurrencia_form')
		</div>
		<div class="panel panel-footer">
			<center>{!!Form::submit(trans('messages.registrar'),['class'=>'btn btn-success btnocu'])!!}</center>
		{!!Form::close()!!}
		</div>
		
	</div>
@stop