@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Clase / Actualizar</li>
	</ol>
</div><br>
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<center>Actualizar Clase</center>
		</div>
		<div class="panel panel-body">
		{!!Form::model($clase, ['route'=>['admin.clase.update', $clase -> id],'method'=>'PUT'])!!}
		@include('clase.forms.clase_form')
		</div>
		<div class="panel panel-footer">
			<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-2">
			<center>{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-warning'])!!}
			{!!Form::close()!!}</center>
			</div>
			<div class="col-md-2">
			<center>{!!Form::open(['route'=>['admin.clase.destroy', $clase -> id],'method'=>'DELETE']) !!}
			{!!Form::submit(trans('messages.eliminar'),['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}</center>
			</div>
			</div>			
		</div>	
	</div>
@stop