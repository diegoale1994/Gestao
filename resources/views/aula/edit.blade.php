@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
{!!Form::model($aula, ['route'=>['admin.aula.update', $aula -> id],'method'=>'PUT'])!!}
	@include('aula.forms.aula_form')
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</div>
@stop
