@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
@if (Session::has('message'))
	<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
<table class ="table">
<thead>
	<th>{{ trans('messages.id') }}</th>
	<th>{{ trans('messages.nombre') }}</th>
	<th>{{ trans('messages.cantidadDePersonas') }}</th>
	<th>{{ trans('messages.cantidadDeEquipos') }}</th>
	<th>{{ trans('messages.piso') }}</th>
</thead>
@foreach($aulas as $aula)
<tbody>
<th>{{ $aula -> id }}</th>
<th>{{ $aula -> nombre }}</th>
<th>{{ $aula ->	cant_personas }}</th>
<th>{{ $aula -> cant_equipos }}</th>
<th>{{ $aula -> piso }}</th>
<th>
	{!!Form::open(['route'=>['admin.profesores.destroy', $aula -> id],'method'=>'DELETE']) !!}
</th>
</tbody>
@endforeach
</table>
</div>
@stop
