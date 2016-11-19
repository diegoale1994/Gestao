<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="crediavales-label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
				<h4 class="modal-title" id="project-12-label"><center>Nuevo</center></h4>
			</div>
			<div class="modal-body">
			{!!Form::open(['route'=>'admin.aula.store', 'method'=>'POST'])!!}
				<div class="form-group">
					{!!Form::label('nombre',trans('messages.codigoDeAula'))!!}
					{!!Form::text('id',null,['class'=>'form-control','required'])!!}
				</div>
				<div class="form-group">
					{!!Form::label('nombre_aula',trans('messages.nombreDeLaAula'))!!}
					{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>trans('messages.ejemSalaI'),'required'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('cant_personas',trans('messages.cantidadDePersonas'))!!}
					{!!Form::number('cant_personas',null,['class'=>'form-control','min'=>'1','max'=>'45','required'])!!}
				</div>
				<div class="form-group">
					{!!Form::label('cant_equipos',trans('messages.cantidadDeEquipos'))!!}
					{!!Form::number('cant_equipos',null,['class'=>'form-control','min'=>'1','max'=>'40','required'])!!}
				</div>
				<div class="form-group">
					{!!Form::label('aula_piso',trans('messages.piso'))!!}
					{!!Form::number('piso',null,['class'=>'form-control','min'=>'1','max'=>'2','required'])!!}
				</div>
				
				
			</div>
			<div class="modal-footer">
			<center>
			{!!Form::submit(trans('messages.registrar'),['class'=>'btn btn-success'])!!}
			<a type="button"class="btn btn-primary " data-toggle="modal">Cancelar</a>
			{!!Form::close()!!}
			</center>
			</div>

			
		</div>
	</div>
</div>

@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active" id="form_name" name="rol" duplicate="name">Aula</li>
	</ol>
</div><!--/.row-->
@if (Session::has('message'))
<br>
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
<br>
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
	
		<div class="panel-heading">
			<a type="button" class="btn btn-success glyphicon glyphicon-plus" data-toggle="modal"  data-target="#new"> </a>
		</div>
		
		<div class="panel panel-body">
			<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
				<thead>
					<tr>
						<th>{{ trans('messages.id') }}</th>
						<th>{{ trans('messages.nombre') }}</th>
						<th>{{ trans('messages.cantidadDePersonas') }}</th>
						<th>{{ trans('messages.cantidadDeEquipos') }}</th>
						<th>{{ trans('messages.piso') }}</th>
						<th >Actualizar</th>
						<th>Eliminar</th>
						
					</tr>
				</thead>
				<tbody>
				@foreach($aulas as $aula)
					<tr>
						<td>{{ $aula -> id }}</td>
						<td>{{ $aula -> nombre }}</td>
						<td>{{ $aula ->	cant_personas }}</td>
						<td>{{ $aula -> cant_equipos }}</td>
						<td>{{ $aula -> piso }}</td>
						<td>{!!link_to_route('admin.aula.edit', $title = trans('messages.editar'), $parameters = $aula->id, $attributes = ['class'=>'btn btn-warning '])!!}</td>
						<td>{!!Form::open(['route'=>['admin.aula.destroy', $aula -> id],'method'=>'DELETE']) !!}
						{!!Form::submit(trans('messages.eliminar'),['class'=>'btn btn-danger '])!!}
						{!!Form::close()!!}</td>
						
						
					</tr>				
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
@stop
