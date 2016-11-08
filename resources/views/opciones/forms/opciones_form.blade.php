
	<div class="col-md-6">
		<center>{!!Form::label('nombre1',trans('messages.inicioSemestre'))!!}</center>
		{!!Form::date('inicio_semestre', $inicioSemestre->valor, ['class' => 'form-control']);!!}
	</div>
	<div class="col-md-6">
		<center>{!!Form::label('nombre2',trans('messages.finSemestre'))!!}</center>
		{!!Form::date('fin_semestre', $finSemestre->valor, ['class' => 'form-control']);!!}
	</div>
	




