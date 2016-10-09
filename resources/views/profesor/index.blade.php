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
	<th>{{ trans('messages.nombre') }}</th>
	<th>{{ trans('messages.apellido') }}</th>
	<th>{{ trans('messages.correo') }}</th>
	<th>{{ trans('messages.estado') }}</th>
</thead>
@foreach($profesores as $profesor)
<tbody>
<th>{{ $profesor -> nombre1 }}</th>
<th>{{ $profesor -> apellido1 }}</th>
<th>{{ $profesor ->	email }}</th>
<th>
	@if ($profesor -> estado == 'N')
		{{ trans('messages.noAprobado') }}
	@else
	{{ trans('messages.aprobado') }}
	@endif

</th>
<th>
@if ($profesor -> estado == 'N')
	 <input type="button" class="btn btn-danger" value="{{ trans('messages.aprobar') }}" onClick="window.location.href='/admin/profesores/aprobar/{{ $profesor -> id }}'">
	  <input type="button" class="btn btn-danger" value="{{ trans('messages.eliminar') }}" onClick="window.location.href='/admin/profesores/aprobar/{{ $profesor -> id }}'">
@else

 	{!!Form::open(['route'=>['admin.profesores.destroy', $profesor -> id],'method'=>'DELETE']) !!}
 	{!!Form::submit(trans('messages.eliminar'),['class'=>'btn btn-danger'])!!}
@endif
	
</th>
</tbody>
@endforeach
</table>
</div>
@stop
