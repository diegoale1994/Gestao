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
	<th>{{ trans('messages.clase') }}</th>
	<th>{{ trans('messages.fecha') }}</th>
	<th>{{ trans('messages.horaInicio') }}</th>
	<th>{{ trans('messages.horaFinal') }}</th>
	<th>{{ trans('messages.responsable') }}</th>
</thead>
@foreach($peticiones as $peticion)
<tbody>
<th>{{ $peticion -> nombre }}</th>
<th>{{ $peticion -> fecha }}</th>
<th>{{ $peticion ->	hora_inicio }}</th>
<th>{{ $peticion -> hora_final }}</th>
<th>{{ $peticion -> nombre1." ".$peticion-> apellido1 }}</th>
<th>
	<input type="button" class="btn btn-success" value={!! trans('messages.irAHorario') !!} onClick="window.location.href='/admin/peticion/<?php echo $peticion -> fecha ?>' " class="btn btn-success">

</th>
</tbody>
@endforeach
</table>
</div>
@stop
