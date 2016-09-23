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
<?php

if(!isset($semana)){
  $diaSemanaActual= ((getDate(time())['wday'])+6)%7;
  $semana = date ("Y-m-d", strtotime("-".$diaSemanaActual." day", strtotime("now")));
}
if(!isset($diaSemana)){
   $diaSemana= ((getDate(time())['wday'])+6)%7;
}
if(!isset($numeroSala)){
  $numeroSala=1;
}


$inicioSemestreDia= ((getDate(strtotime($inicioSemestre))['wday'])+6)%7;
$lunesSemana = date ("Y-m-d", strtotime("-".$inicioSemestreDia." day", strtotime($inicioSemestre)));
$semanas=array();
while($lunesSemana <= $finSemestre){
  $semanas[$lunesSemana]= $lunesSemana." ".trans('messages.al')." ".date ("Y-m-d", strtotime("+6 day", strtotime($lunesSemana)));
  $lunesSemana = date ("Y-m-d", strtotime("+7 day", strtotime($lunesSemana)));
}
?>
<div id='opciondia'>
<div id="Filtro dia" class="form-group">
{!!Form::label('dia_semana',trans('messages.dia'))!!}
{!! Form::select('dia_semana',[trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')],$diaSemana,['id'=>'dia_semana']) !!}
{!!Form::select('no_semana_dia', $semanas,$semana,['id'=>'no_semana_dia']) !!}
<input type="button" value={!! trans('messages.mostrar') !!} onClick="window.location.href='/admin/datasheet/'+$('#tipo_mostrar').val()+'/'+$('#dia_semana').val()+'/'+$('#no_semana_dia').val()">
</div>
</div>
<div id="opcionsemana" class="form-group">
{!!Form::label('no_sala',trans('messages.numeroSala'))!!}
{!! Form::select('no_sala', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'],$numeroSala,['id'=>'no_sala']) !!}
{!!Form::label('no_semana',trans('messages.semana'))!!}
{!!Form::select('no_semana', $semanas,$semana,['id'=>'no_semana']) !!}
<input type="button" value={!! trans('messages.mostrar') !!} onClick="window.location.href='/admin/datasheet/'+$('#tipo_mostrar').val()+'/'+$('#no_sala').val()+'/'+$('#no_semana').val()">
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
<?php $hora = date("G");?>
    @if ($hora == $j)
  <tr bgcolor='#58ACFA'>
    @else
<tr>
    @endif
 
       
        <th scope="row">{{ $j }} - {{ $j + 1 }} </th>
       @for ($i = 1; $i <=10; $i++)

  
<?php $a=0; ?>
      @foreach ($clases_today as $element)
     @if (($element -> hora_inicio <= $j) && ($element -> hora_final > $j) && ($element -> id == $i))
       <td>{{ $element -> nombre }} - {{ $element -> nombre1 }} {{ " " }}{{ $element -> apellido1 }}{{ " - " }}{{ $element -> grupo }}
       <?php 
        $uri= $_SERVER["REQUEST_URI"];
        $uri = str_replace ("/", "-", $uri);
       ?>
       <input type="button" class="btn btn-danger" value="x" onClick="window.location.href='/admin/desreserva/{{ $j }}/{{ $fecha }}/{{ $element->id_clase }}/{{ $uri }}'">
       
       
        </td>
       
     <?php $a++; ?>  
     @endif
      @endforeach
@if ($a == 0)
  <td>
    <?php 
        $uri= $_SERVER["REQUEST_URI"];
        $uri = str_replace ("/", "-", $uri);
       ?>

<input type="button" class="btn btn-success" value={!! trans('messages.reservar') !!} onClick="window.location.href='/admin/reserva/{{ $i }}/{{ $j }}/{{ $fecha }}/{{ $uri }}' ">



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
       <?php $hora = date("G");?>
    @if ($hora == $j)
  <tr bgcolor='#58ACFA'>
    @else
<tr>
    @endif
        
        <th scope="row">{{ $j }} - {{ $j + 1 }} </th>
       @for ($i = 0; $i < 6; $i++)

  
<?php $a=0; ?>
      @foreach ($clases_today as $element)
     @if (($element -> hora_inicio <= $j) && ($element -> hora_final > $j) && ($element -> fecha == date ("Y-m-d", strtotime("+".$i." day", strtotime($fecha)))))
       <td>{{ $element -> nombre }}- {{ $element -> nombre1 }} {{ " " }}{{ $element -> apellido1 }}{{ " - " }}{{ $element -> grupo }}
         <?php 
        $uri= $_SERVER["REQUEST_URI"];
        $uri = str_replace ("/", "-", $uri);
       ?>
       <?php 
$nuevafecha = strtotime ( '+'.$i.' day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
       ?>
 <input type="button" class="btn btn-danger" value="x" onClick="window.location.href='/admin/desreserva/{{ $j }}/{{ $nuevafecha }}/{{ $element->id_clase }}/{{ $uri }}'">

       </td>
     <?php $a++; ?>  
     @endif
      @endforeach
@if ($a == 0)
  <td>
<?php 
$nuevafecha = strtotime ( '+'.$i.' day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        $uri= $_SERVER["REQUEST_URI"];
        $uri = str_replace ("/", "-", $uri);
       ?>

<input type="button" class="btn btn-success" value={!! trans('messages.reservar') !!} onClick="window.location.href='/admin/reserva/{{ $aula }}/{{ $j }}/{{ $nuevafecha }}/{{ $uri }}' ">

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
