
<div class="form-group">
		{!!Form::label('nombre','Codigo de Aula:')!!}
		{!!Form::text('id',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre_aula','Nombre de la aula:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ejem: Sala I','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_personas','Cantidad de personas:')!!}
		{!!Form::number('cant_personas',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_equipos','Cantidad de equipos:')!!}
		{!!Form::number('cant_equipos',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('aula_piso','Piso:')!!}
		{!!Form::number('piso',null,['class'=>'form-control','min'=>'1','max'=>'2','required'])!!}
	</div>