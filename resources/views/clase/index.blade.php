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
	<th>Nombre</th>
	<th>Grupo</th>
	<th>Creditos</th>
	<th>Semestre</th>
	<th>Cantidad de estudiantes</th>
	<th>Requerimientos</th>
</thead>
@foreach($clases as $clase)
<tbody>
<th>{{ $clase -> id }}</th>
<th>{{ $clase -> nombre }}</th>
<th>{{ $clase -> grupo }}</th>
<th>{{ $clase -> creditos }}</th>
<th>{{ $clase -> semestre }}</th>
<th>{{ $clase -> cant_estudiantes }}</th>
<th>{{ $clase -> requerimientos }}</th>
<th>
	{!!link_to_route('admin.clase.edit', $title = 'Editar', $parameters = $clase->id, $attributes = ['class'=>'btn btn-primary'])!!}
</th>
</tbody>
@endforeach
</table>
</div>
@stop