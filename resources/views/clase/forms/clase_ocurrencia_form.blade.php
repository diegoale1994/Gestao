<div class="form-group">
    	{!!Form::label('horario',trans('messages.horario'))  !!}
    </div>
    <div class="form-group">
    	{!!Form::label('dia',trans('messages.diaDeLaSemana'))!!}
    	{!! Form::select('dia', [trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')]) !!}
    </div>
    <div class="form-group">
    	{!!Form::label('horaInicio',trans('messages.horaInicial'))!!}
    	{!!Form::number('horaInicio',null,['class'=>'form-control','min'=>'7','max'=>'21','required'])!!}
    </div>
    <div class="form-group">	
    	{!!Form::label('horaFinal',trans('messages.horaFinal'))!!}
    	{!!Form::number('horaFinal',null,['class'=>'form-control','min'=>'8','max'=>'22','required'])!!}
    </div>
    <div class="form-group">
    {!!Form::label('ocurrencias',trans('messages.ocurrencias'))!!}
    {!! Form::select('ocurrencias', [trans('messages.todoElSemestre'), trans('messages.unaSolaVes')]) !!}
    </div>