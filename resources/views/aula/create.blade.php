@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
{!!Form::open(['route'=>'admin.aula.store', 'method'=>'POST'])!!}
@include('aula.forms.aula_form')
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</div>
@stop
