@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
{!!Form::open(['route'=>'admin.clase.store', 'method'=>'POST'])!!}
@include('clase.forms.clase_form')
	{!!Form::submit(trans('messages.registrar'),['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</div>
@stop