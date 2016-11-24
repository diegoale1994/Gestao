@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Profesores</li>
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
				<center>Profesores</center>
			</div>
			<div class="panel-body">
				<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
					<thead>
						<th>{{ trans('messages.nombre') }}</td>
						<th>{{ trans('messages.apellido') }}</td>
						<th>{{ trans('messages.correo') }}</td>
						<th>{{ trans('messages.estado') }}</td>
						<th>Acciones</th>
					</thead><tbody>
					@foreach($profesores as $profesor)
						<tr>
						<td>{{ $profesor -> nombre1 }}</td>
						<td>{{ $profesor -> apellido1 }}</td>
						<td>{{ $profesor ->	email }}</td>
						<td>
							@if ($profesor -> estado == 'N')
								{{ trans('messages.noAprobado') }}
							@else
							{{ trans('messages.aprobado') }}
							@endif

						</td>
						<td>
						@if ($profesor -> estado == 'N')
							 <input type="button" class="btn btn-danger" value="{{ trans('messages.aprobar') }}" onClick="window.location.href='/admin/profesores/aprobar/{{ $profesor -> id }}'">
							  <input type="button" class="btn btn-danger" value="{{ trans('messages.eliminar') }}" onClick="window.location.href='/admin/profesores/aprobar/{{ $profesor -> id }}'">
						@else

						 	{!!Form::open(['route'=>['admin.profesores.destroy', $profesor -> id],'method'=>'DELETE']) !!}
						 	{!!Form::submit(trans('messages.eliminar'),['class'=>'btn btn-danger'])!!}
						 	{!! Form::close() !!}
						@endif
							
						</td>
					</tr>
					@endforeach</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop
