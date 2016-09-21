
<div class="form-group">
		{!!Form::label('nombre1',trans('messages.inicioSemestre'))!!}
		{!!Form::date('inicio_semestre', $inicioSemestre->valor);!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre2',trans('messages.finSemestre'))!!}
		{!!Form::date('fin_semestre', $finSemestre->valor);!!}
	</div>
	




