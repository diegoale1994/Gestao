@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Peticiones</li>
	</ol>
</div><br>	
@if (Session::has('message'))
	<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center>Peticiones</center>
				</div>
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
						<thead>
							<th>{{ trans('messages.clase') }}</th>
							<th>{{ trans('messages.fecha') }}</th>
							<th>{{ trans('messages.horaInicial') }}</th>
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
								<input type="button" class="btn btn-success" value={!! trans('messages.irAHorario') !!} onClick="window.location.href='/admin/peticion/<?php echo $peticion -> fecha ?>' ">

							</th>
							<th>
							<input type="button" class="btn btn-danger" value={!! trans('messages.eliminarOcurrencia') !!} onClick="window.location.href='/admin/peticion/<?php echo $peticion -> fecha.'/'.$peticion -> id_clase ?>' ">
							</th>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
