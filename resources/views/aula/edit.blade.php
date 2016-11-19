@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Aula / Actualizar</li>
	</ol>
</div><br>
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<center>Actualizar Aula</center>
		</div>
		<div class="panel panel-body">
				{!!Form::model($aula, ['route'=>['admin.aula.update', $aula -> id],'method'=>'PUT'])!!}
				@include('aula.forms.aula_form')
		</div>
		<div class="panel panel-footer">
			<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-2">
			<center>{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-warning btn_actu'])!!}
			{!!Form::close()!!}</center>
			</div>
			<div class="col-md-2">
			<center><a type="button" class="btn btn-primary " href="../../../admin/aula">Cancelar</a></center>
			</div>
			</div>			
		</div>					
	</div>
</div>
			@stop
