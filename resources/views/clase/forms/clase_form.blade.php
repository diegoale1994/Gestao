
<div class="form-group">
		{!!Form::label('id',trans('messages.codigoDeLaClase'))!!}
		{!!Form::text('id',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
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
		{!!Form::label('cant_estudiantes',trans('messages.cantidadDeEstudiantes'))!!}
		{!!Form::number('cant_estudiantes',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('requerimientos',trans('messages.requerimientos'))!!}
		{!!Form::text('requirimientos',null,['class'=>'form-control'])!!}
	</div>
	