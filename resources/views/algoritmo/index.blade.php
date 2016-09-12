@extends('layouts.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	



{!!Form::open(['route'=>'admin.algoritmo.algorithm_step1', 'method'=>'POST'])!!}
<div class="form-group">
{!! Form::label('fecha_1', trans('messages.AsignarClasesDe')); !!}
{!! Form::date('fecha_inicio', \Carbon\Carbon::now()); !!}
{!! Form::label('fecha_2', trans('messages.Hasta ')); !!}
{!! Form::date('fecha_fin', \Carbon\Carbon::now()); !!}
<button type="button" onClick="window.open('http://www.unicundi.edu.co/documents/admisiones/calendario_acad_2016.PDF')" class="btn btn-warning" ht>{!! trans('messages.VerCalendarioAcademico') !!}</button>
</div>
<div class="form-group">
{!! Form::label('constante', trans('messages.ConstanteDeAsignacion')); !!}
<br>
{!! Form::label('constante_0', trans('messages.Constante0')); !!}
{!! Form::radio('constante', '0'); !!}
{!! Form::label('constante_0.05', trans('messages.Constante0.005')); !!}
{!! Form::radio('constante', '0.005'); !!}
{!! Form::label('constante_0.01', trans('messages.Constante0.01')); !!}
{!! Form::radio('constante', '0.01'); !!}
{!! Form::label('constante_0.015', trans('messages.Constante0.015')); !!}
{!! Form::radio('constante', '0.015'); !!}
{!! Form::label('constante_0.03', trans('messages.Constante0.3')); !!}
{!! Form::radio('constante', '0.03',['checked']); !!}
</div>
	{!!Form::submit(trans('messages.establecerParametros'),['class'=>'btn btn-primary'])!!}
	{!!Form::close();!!}

	</div>

@stop
