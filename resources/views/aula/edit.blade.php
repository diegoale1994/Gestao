@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
{!!Form::model($aula, ['route'=>['admin.aula.update', $aula -> id],'method'=>'PUT'])!!}
	@include('aula.forms.aula_form')
	<table>
	<tr>
	<td>
	{!!Form::submit(trans('messages.actualizar'),['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	</td>
	<td>
	{!!Form::open(['route'=>['admin.aula.destroy', $aula -> id],'method'=>'DELETE']) !!}
	{!!Form::submit(trans('messages.eliminar'),['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	</td>
	</tr>
	</table>
	</div>
@stop
