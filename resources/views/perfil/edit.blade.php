@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Perfil</li>
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
			<center><div class="col-md-12">Perfil</div><center>
				
		</div>
		<div class="panel-body">
			{!!Form::model($perfil, ['route'=>['admin.perfil.update', $perfil -> id],'method'=>'PUT'])!!}
			@include('perfil.forms.perfil_form')
			<div class="col-md-12">
				<br><center>{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-warning'])!!}</center>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
</div>
@stop
