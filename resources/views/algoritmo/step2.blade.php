@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<br>
	<div class="col-md-12">
		<div class="panel panel-info">
					<div class="panel-heading">
						{{ trans('messages.Configuracion') }}
					</div>
					<div class="panel-body">
					<table></table>
				<h3>{{ trans('messages.fechas') }}</h3>

{!!Form::open(['route'=>'admin.algoritmo.algorithm_step1', 'method'=>'POST'])!!}
<div class="form-group">
<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3">
{!! Form::label('fecha_1', trans('messages.AsignarClasesDe')) !!}
</div>
<div class="col-lg-2">

{!!Form::date('fecha_inicio', Session::get('algoritmo_fecha_inicio'));!!}
</div>
<div class="col-lg-2">
{!! Form::label('fecha_2', trans('messages.Hasta ')); !!}
</div>
<div class="col-lg-2">
{!!Form::date('fecha_fin', Session::get('algoritmo_fecha_final'));!!}
</div>
<div class="col-lg-3">
<button type="button" onClick="window.open('http://www.unicundi.edu.co/documents/admisiones/calendario_acad_2016.PDF')" class="btn btn-warning" ht>{!! trans('messages.VerCalendarioAcademico') !!}</button>
</div>
</div>
</div>

<h3>{{ trans('messages.horas') }}</h3>

					<h3>{{ trans('messages.ConstanteDeAsignacion') }}</h3>
				

<div class="row">
			<div class="col-lg-12">
			<center>
{!! Form::label('constante_0', '0.0'); !!}
{!! Form::radio('constante', '0'); !!}

{!! Form::label('constante_0.05', '0.05'); !!}
{!! Form::radio('constante', '0.005'); !!}

{!! Form::label('constante_0.01', '0.01'); !!}
{!! Form::radio('constante', '0.01'); !!}
{!! Form::label('constante_0.015', '0.015'); !!}
{!! Form::radio('constante', '0.015'); !!}
{!! Form::label('constante_0.03', '0.03'); !!}
{!! Form::radio('constante', '0.03',['checked']); !!}
</center>
	</div>
				</div>
			</div>

	{!!Form::submit(trans('messages.establecerParametros'),['class'=>'btn btn-primary'])!!}
	{!!Form::close();!!}

	</div>
</div>



</div>

@if (isset($clases_por_asignar))

	
						<div class="col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						{!! trans('messages.clases') !!}
					</div>
					<div id ="resultados_clase_algoritmo">
			
					<table class="table table-striped">
<thead>
	<th>{!! trans('messages.nombre') !!}</th>
	<th>{!! trans('messages.fecha') !!}</th>
</thead>
@foreach($clases_por_asignar as $ex)
<tbody>
<th><p>{{ $ex -> nombre }}</p></th>
<th>{{ $ex -> fecha }}</th>
</tbody>
@endforeach
</table>
					</div>
				</div>
				<button type="button" class="btn btn-success" onclick = "location='/admin/algoritmo/make_algoritmo'">ASIGNAR!!</button>
			</div>
				
				<div class="col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
					{!! trans('messages.aulas') !!}
					</div>
					<div class="panel-body">
					<table class="table table-striped">
						<thead>
	<th>{!! trans('messages.id') !!}</th>
	<th>{!! trans('messages.nombre') !!}</th>
</thead>

@foreach(Session::get('aulas_array') as $au)
<tbody>
<th><p>{{ $au -> id }}</p></th>
<th>{{ $au -> nombre }}</th>
<th><th>

	{!!link_to_route('admin.algoritmo.delete_aula', $title = trans('messages.eliminar'), $parameters = $au->id, $attributes = ['class'=>'btn btn-primary'])!!}
</th></th>
</tbody>
@endforeach
</table>
					</div>
				
			
@endif

	</div>
</div>
@stop
