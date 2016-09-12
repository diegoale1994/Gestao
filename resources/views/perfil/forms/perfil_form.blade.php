
<div class="form-group">
		{!!Form::label('nombre1',trans('messages.nombre1'))!!}
		{!!Form::text('nombre1',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre2',trans('messages.nombre2'))!!}
		{!!Form::text('nombre2',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('apellido1',trans('messages.apellido1'))!!}
		{!!Form::text('apellido1',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('apellido2',trans('messages.apellido2'))!!}
		{!!Form::text('apellido2',null,['class'=>'form-control'])!!}
	</div>
		<div class="form-group">
		{!!Form::label('email',trans('messages.correo'))!!}
		{!!Form::email('email',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('password',trans('messages.contrasena'))!!}
		{!! Form::password('password',['class'=>'form-control','placeholder'=>trans('messages.mantengaVacioSiNoVaAActualizarSuContrasena')]) !!}
	</div>
	<div class="form-group">
		{!!Form::label('password2',trans('messages.confirmeSuNuevaContrasena'))!!}
		{!! Form::password('password2',['class'=>'form-control','placeholder'=>trans('messages.mantengaVacioSiNoVaAActualizarSuContrasena')]) !!}
	</div>
	<div class="form-group">
		{!!Form::label('telefono',trans('messages.telefono'))!!}
		{!!Form::number('telefono',null,['class'=>'form-control','min'=>'1000000','max'=>'9999999999','required'])!!}
	</div>
	<div class="form-group">
    {!!Form::label('programa_id',trans('messages.programa'))!!}
    {!! Form::select('programa_id',$programas,null) !!}
    </div>