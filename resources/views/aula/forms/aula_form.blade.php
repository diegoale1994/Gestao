
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
		{!!Form::number('cant_personas',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_equipos',trans('messages.cantidadDeEquipos'))!!}
		{!!Form::number('cant_equipos',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('aula_piso',trans('messages.piso'))!!}
		{!!Form::number('piso',null,['class'=>'form-control','min'=>'1','max'=>'2','required'])!!}
	</div>