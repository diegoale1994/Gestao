@extends('layouts.admin')

@section('content')
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<br>
<div class="panel panel-default">
  <div class="panel-body">
   

<div class="form-group">
{!!Form::label('mostrar',trans('messages.mostrarPor'))!!}
{!! Form::select('tipo_mostrar', [trans('messages.dia'), trans('messages.semana')],null,['id'=>'tipo_mostrar']) !!}
</div>
<div id='opciondia'>
<div id="Filtro dia" class="form-group">
{!!Form::label('dia_semana',trans('messages.dia'))!!}
{!! Form::select('dia_semana',[trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')],null,['id'=>'dia_semana']) !!}
</div>
</div>
<div id="opcionsemana" class="form-group">
{!!Form::label('no_sala',trans('messages.numeroSala'))!!}
{!! Form::select('no_sala', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'],null,['id'=>'no_sala']) !!}

<?php
$diaSemanaActual= ((getDate(time())['wday'])+6)%7;
$lunesSemana = date ("Y-m-d", strtotime("-".$diaSemanaActual." day", strtotime("now")));
$semanas=array();
while($lunesSemana <= $finSemestre){
  $semanas[$lunesSemana]= $lunesSemana." ".trans('messages.al')." ".date ("Y-m-d", strtotime("+6 day", strtotime($lunesSemana)));
  $lunesSemana = date ("Y-m-d", strtotime("+7 day", strtotime($lunesSemana)));
}
?>
{!!Form::label('no_semana',trans('messages.semana'))!!}
{!!Form::select('no_semana', $semanas,null,['id'=>'no_semana']) !!}
</div>
<div  class="form-group">
<input type="button" value={!! trans('messages.mostrar') !!} onClick="window.location.href='/admin/datasheet/'+$('#tipo_mostrar').val()+'/'+$('#dia_semana').val()+'/'+$('#no_sala').val()+'/'+$('#no_semana').val()">
</div>
 </div>
</div>


 @if($dia)
 <h1>Seleccionado: {{ $nombre_dia }}</h1>
<table class="table table-hover">
    <thead class="thead-inverse">
        <tr>
      <th>#</th>
      <td>{!! trans('messages.aula1') !!}</td>
      <td>{!! trans('messages.aula2') !!}</td>
      <td>{!! trans('messages.aula3') !!}</td>
      <td>{!! trans('messages.aula4') !!}</td>
      <td>{!! trans('messages.aula5') !!}</td>
      <td>{!! trans('messages.aula6') !!}</td>
      <td>{!! trans('messages.aula7') !!}</td>
      <td>{!! trans('messages.aula8') !!}</td>
      <td>{!! trans('messages.aula9') !!}</td>
      <td>{!! trans('messages.aula10') !!}</td> 
        </tr>
    </thead>
    <tbody>
 
      {{-- expr --}}
    @for ($j = 7; $j < 22; $j++)
        <tr>
        <th scope="row">{{ $j }} - {{ $j + 1 }} </th>
       @for ($i = 1; $i <=10; $i++)

  
<?php $a=0; ?>
      @foreach ($clases_today as $element)
     @if (($element -> hora_inicio <= $j) && ($element -> hora_final > $j) && ($element -> id == $i))
       <td>{{ $element -> nombre }}</td>
     <?php $a++; ?>  
     @endif
      @endforeach
@if ($a == 0)
  <td>
    

<input type="button" value={!! trans('messages.reservar') !!} onClick="window.location.href='/admin/reserva/{{ $i }}/{{ $j }}/{{ $fecha }}' ">



  </td>
@endif
@endfor
        </tr>
            
            @endfor
           
        
    </tbody>
</table>
@endif
 @if(!$dia)
  <h1>Seleccionado: Aula: {{ $aula }} del {{ $nombre_dia1 }} al {{ $nombre_dia2 }}</h1>
<table class="table table-hover">
    <thead class="thead-inverse">
      <tr>
      <th>#</th>
      <td>{!! trans('messages.lunes') !!}</td>
      <td>{!! trans('messages.martes') !!}</td>
      <td>{!! trans('messages.miercoles') !!}</td>
      <td>{!! trans('messages.jueves') !!}</td>
      <td>{!! trans('messages.viernes') !!}</td>
      <td>{!! trans('messages.sabado') !!}</td> 
      </tr>
    </thead>
    <tbody>
    @for ($j = 7; $j < 22; $j++)
        <tr>
        <th scope="row">{{ $j }} - {{ $j + 1 }} </th>
       @for ($i = 0; $i < 6; $i++)

  
<?php $a=0; ?>
      @foreach ($clases_today as $element)
     @if (($element -> hora_inicio <= $j) && ($element -> hora_final > $j) && ($element -> fecha == date ("Y-m-d", strtotime("+".$i." day", strtotime($fecha)))))
       <td>{{ $element -> nombre }}</td>
     <?php $a++; ?>  
     @endif
      @endforeach
@if ($a == 0)
  <td>
<input type="button" value={!! trans('messages.reservar') !!} onClick="window.location.href='/admin/reserva/{{ $aula }}/{{ $j }}/{{ date ("Y-m-d", strtotime("+".$i." day", strtotime($fecha))) }}' ">



  </td>
@endif
@endfor
        </tr>
            
            @endfor
           
        
    </tbody>
</table>
@endif 

		</div>
		
@stop
