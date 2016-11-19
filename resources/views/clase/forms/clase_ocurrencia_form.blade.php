  <div id='ocu_error_div'>
<div class="alert alert-warning">
                    <strong>{!!Form::label('errors_ocu','')!!}</strong> 
                    </div>
                    </div>
    <div class="col-md-6">
    	{!!Form::label('dia',trans('messages.diaDeLaSemana'))!!}
    	{!! Form::select('dia', [trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')],['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6">
    	{!!Form::label('horaInicio',trans('messages.horaInicial'))!!}
    	{!!Form::number('horaInicio',null,['class'=>'form-control clase_hora_inicio1','min'=>'7','max'=>'21','required'])!!}
    </div>
    <div class="col-md-6">	
    	{!!Form::label('horaFinal',trans('messages.horaFinal'))!!}
    	{!!Form::number('horaFinal',null,['class'=>'form-control clase_hora_final1','min'=>'8','max'=>'22','required'])!!}
    </div>
    <div class="col-md-6"><br>
    {!!Form::label('ocurrencias',trans('messages.ocurrencias'))!!}
    {!! Form::select('ocurrencias', [trans('messages.todoElSemestre'), trans('messages.unaSolaVes')]) !!}
    </div>