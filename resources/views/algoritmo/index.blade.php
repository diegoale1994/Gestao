@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Asignar Clase</li>
	</ol>
</div><br>	
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<center><center><div class="col-md-8">{{ trans('messages.fechas') }}</div>
					<div class="col-md-4">
					<button type="button" onClick="window.open('http://www.unicundi.edu.co/documents/admisiones/calendario_acad_2016.PDF')" class="btn btn-warning" ht>{!! trans('messages.VerCalendarioAcademico') !!}</button>
				</div></center></center>
			</div>
			<div class="panel-body">

				{!!Form::open(['route'=>'admin.algoritmo.algorithm_step1', 'method'=>'POST'])!!}
				<div class="col-md-4">
					{!! Form::label('fecha_1', trans('messages.AsignarClasesDe')) !!}
					{!!Form::date('fecha_inicio', Session::get('algoritmo_fecha_inicio'), ['class' => 'form-control']);!!}
				</div>
				<div class="col-md-4">
					{!! Form::label('fecha_2', trans('messages.hasta')); !!}
					{!!Form::date('fecha_fin', Session::get('algoritmo_fecha_final'), ['class' => 'form-control']);!!}
				</div>
					
				<div class="col-md-4">
				<br>
					<center>{!!Form::submit(trans('messages.establecerParametros'),['class'=>'btn btn-primary'])!!}
					{!!Form::close();!!}</center>
				</div>	
			</div>
		</div>
	</div>

@if (session::has('clases_por_asignar'))

	
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
			{!! trans('messages.clases') !!}
			</div>
			<div class="panel panel-body" id ="">
				<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="desc" class="table table-striped">
					<thead>
						<th>{!! trans('messages.nombre') !!}</th>
						<th>{!! trans('messages.fecha') !!}</th>
					</thead>
					<tbody>
						@foreach(session::get('clases_por_asignar') as $ex)
						<tr>					
							<td><p>{{ $ex -> nombre }}</p></td>
							<td>{{ $ex -> fecha }}</td>
						</tr>					
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-success" onclick = "ejecutaralgoritmopro()">{!! trans('messages.asignar') !!}</button>
			</div>
		</div>
	</div>
				
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
			{!! trans('messages.aulas') !!}
			</div>
			<div class="panel-body">
				<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="desc" class="table table-striped">
					<thead>
						
						<th>{!! trans('messages.nombre') !!}</th>
						<th>Acciones</th>
					</thead>
					<tbody>
					@foreach(Session::get('aulas_array') as $au)	
						<tr>	
						
						<td>{{ $au -> nombre }}</td>
						<td>{!!link_to_route('admin.algoritmo.delete_aula', $title = trans('messages.eliminar'), $parameters = $au->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>	
						</tr>			
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif
</div>
@stop
