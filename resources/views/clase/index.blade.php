<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="crediavales-label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
				<h4 class="modal-title" id="project-12-label"><center>Nuevo</center></h4>
			</div>
			<div class="modal-body">
				{!!Form::open(['route'=>'admin.clase.store', 'method'=>'POST'])!!}
				<div class="row">
				<div id='clase_error_div'>
<div class="alert alert-warning">
  					<strong>{!!Form::label('errors_clase','')!!}</strong> 
					</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-6">
							{!!Form::label('id',trans('messages.codigoDeLaClase'))!!}
							{!!Form::text('id',null,['class'=>'form-control','required'])!!}
						</div>
						<div class="col-md-6">
							{!!Form::label('nombre_aula',trans('messages.nombreDeLaClase'))!!}
							{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>trans('messages.ejemComputacionGrafica'),'required'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('grupo',trans('messages.grupo'))!!}
							{!!Form::text('grupo',null,['class'=>'form-control','placeholder'=>trans('messages.ejemSis501')])!!}
						</div>
						
						<div class="form-group">
							{!!Form::label('creditos',trans('messages.numeroDeCreditos'))!!}
							{!!Form::number('creditos',null,['class'=>'form-control','min'=>'1','max'=>'5'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('semestre',trans('messages.semestre'))!!}
							{!!Form::number('semestre',null,['class'=>'form-control','min'=>'1','max'=>'12'])!!}
						</div>
						<div class="form-group">
							<center>{!!Form::label('cant_estudiantes',trans('messages.cantidadDeEstudiantes'))!!}</center>
							{!!Form::number('cant_estudiantes',null,['class'=>'form-control','min'=>'1','required'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('requerimientos',trans('messages.requerimientos'))!!}
							{!!Form::text('requerimientos',null,['class'=>'form-control'])!!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					    	{!!Form::label('horario',trans('messages.horario'))  !!}
					    </div>
					    <div class="form-group">
					    	{!!Form::label('dia',trans('messages.diaDeLaSemana'))!!}
					    	{!! Form::select('dia', [trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')]) !!}
					    </div>
					    <div class="form-group">
					    	{!!Form::label('horaInicio',trans('messages.horaInicial'))!!}
					    	{!!Form::number('horaInicio',null,['class'=>'form-control clase_hora_inicio','min'=>'7','max'=>'21','required'])!!}
					    </div>
					    <div class="form-group">	
					    	{!!Form::label('horaFinal',trans('messages.horaFinal'))!!}
					    	{!!Form::number('horaFinal',null,['class'=>'form-control clase_hora_final','min'=>'8','max'=>'22','required'])!!}
					    </div>
					    <div class="form-group">
					    {!!Form::label('ocurrencias',trans('messages.ocurrencias'))!!}
					    {!! Form::select('ocurrencias', [trans('messages.todoElSemestre'), trans('messages.unaSolaVes')]) !!}
					    </div>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<center>
			{!!Form::submit(trans('messages.registrar'),['class'=>'btn btn-success btn_create_class'])!!}
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
		<li class="active" id="form_name" name="rol" duplicate="name">Clase</li>
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
				<a type="button" class="btn btn-success glyphicon glyphicon-plus" data-toggle="modal"  data-target="#new"> </a>
			</div>
			<div class="panel panel-body">
				<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
					<thead>
						
							<th>{{ trans('messages.id') }}</th>
							<th>{{ trans('messages.nombre') }}</th>
							<th>{{ trans('messages.grupo') }}</th>
							<th>{{ trans('messages.creditos') }}</th>
							<th>{{ trans('messages.semestre') }}</th>
							<th>{{ trans('messages.cantidadDeEstudiantes') }}</th>
							<th>{{ trans('messages.requerimientos') }}</th>
							<th>Editar</th>
							<th>Eliminar</th>
						
					</thead>
					<tbody>
					@foreach($clases as $clase)
						<tr>
							<td>{{ $clase -> id }}</td>
							<td>{{ $clase -> nombre }}</td>
							<td>{{ $clase -> grupo }}</td>
							<td>{{ $clase -> creditos }}</td>
							<td>{{ $clase -> semestre }}</td>
							<td>{{ $clase -> cant_estudiantes }}</td>
							<td>{{ $clase -> requerimientos }}</td>
							<td>{!!link_to_route('admin.clase.edit', $title = trans('messages.editar'), $parameters = $clase->id, $attributes = ['class'=>'btn btn-warning'])!!}
							</td>
							<td>{!!link_to_route('admin.clase.createocurrence', $title = trans('messages.anadirOcurrencia'), $parameters = $clase->id, $attributes = ['class'=>'btn btn-primary'])!!}
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

</div>
@stop