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
	<th>{{ trans('messages.grupo') }}</th>
	<th>{{ trans('messages.creditos') }}</th>
	<th>{{ trans('messages.semestre') }}</th>
	<th>{{ trans('messages.cantidadDeEstudiantes') }}</th>
	<th>{{ trans('messages.requerimientos') }}</th>
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
	{!!link_to_route('admin.clase.edit', $title = trans('messages.editar'), $parameters = $clase->id, $attributes = ['class'=>'btn btn-primary'])!!}
</th>
<th>
	{!!link_to_route('admin.clase.createocurrence', $title = trans('messages.anadirOcurrencia'), $parameters = $clase->id, $attributes = ['class'=>'btn btn-info'])!!}
</th>
</tbody>
@endforeach
</table>
</div>
@stop