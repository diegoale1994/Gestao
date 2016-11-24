@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Opciones Generales</li>
	</ol>
</div><br>		
@if (Session::has('error-message'))
	<div class="alert alert-danger">
  {{ Session::get('error-message') }}
</div>
@endif
<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			<center><center><div class="col-md-6">Opciones Generales</div>
				<div class="col-md-3">
				<button type="button" onClick="window.open('http://www.unicundi.edu.co/documents/admisiones/calendario_acad_2016.PDF')" class="btn btn-warning" ht>{!! trans('messages.VerCalendarioAcademico') !!}</button>

			</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-danger" onclick = "borrarpro()">{!! trans('messages.eliminarHorario') !!}</button>

			</div>
			</center></center>
		</div>
		<div class="panel-body">
			{!!Form::open(['route'=>['admin.opciones.store'],'method'=>'POST'])!!}
			@include('opciones.forms.opciones_form')
			<div class="col-md-12">
				<br><center>{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-primary'])!!}</center>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
</div>
@stop


