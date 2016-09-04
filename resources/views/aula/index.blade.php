@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php $message=Session::get('message')?>
@if ($message=='store')
	<div class="alert alert-success">
  <strong>Aula Creada!</strong> Aula creada Correctamente ! 
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
</tbody>
@endforeach
</table>
</div>
@stop
