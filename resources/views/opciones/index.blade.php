@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
@if (Session::has('error-message'))
	<div class="alert alert-danger">
  {{ Session::get('error-message') }}
</div>
@endif
{!!Form::open(['route'=>['admin.opciones.store'],'method'=>'POST'])!!}
	@include('opciones.forms.opciones_form')
	{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</div>
@stop


