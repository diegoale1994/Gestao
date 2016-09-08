
<div class="form-group">
		{!!Form::label('id','Codigo de la clase')!!}
		{!!Form::text('id',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre_aula','Nombre de la clase:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ejem: Computacion Grafica ','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('grupo','Grupo:')!!}
		{!!Form::text('grupo',null,['class'=>'form-control','placeholder'=>'Ejem: SIS501 '])!!}
	</div>
	
	<div class="form-group">
		{!!Form::label('creditos','Numero de creditos:')!!}
		{!!Form::number('creditos',null,['class'=>'form-control','min'=>'1','max'=>'5'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('semestre','Semestre:')!!}
		{!!Form::number('semestre',null,['class'=>'form-control','min'=>'1','max'=>'12'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cant_estudiantes','Cantidad de estudiantes:')!!}
		{!!Form::number('cant_estudiantes',null,['class'=>'form-control','min'=>'1','required'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('requerimientos','Requerimientos:')!!}
		{!!Form::text('requirimientos',null,['class'=>'form-control'])!!}
	</div>
	