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
	<th>Id</th>
	<th>nombre</th>
	<th>cantidad de personas</th>
	<th>cantidad de equipos</th>
	<th>Piso</th>
</thead>
@foreach($aulas as $aula)
<tbody>
<th>{{ $aula -> id }}</th>
<th>{{ $aula -> nombre }}</th>
<th>{{ $aula ->	cant_personas }}</th>
<th>{{ $aula -> cant_equipos }}</th>
<th>{{ $aula -> piso }}</th>
<th>
	{!!link_to_route('admin.aula.edit', $title = 'Editar', $parameters = $aula->id, $attributes = ['class'=>'btn btn-primary'])!!}
</th>
</tbody>
@endforeach
</table>
</div>
@stop
