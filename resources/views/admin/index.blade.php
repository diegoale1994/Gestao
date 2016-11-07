@extends('layouts.admin')

@section('content')
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
  <ol class="breadcrumb">
    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active" id="form_name" name="rol" duplicate="name">Planilla</li>
  </ol>
</div><br>  
<div class="panel panel-default">
  <div class="panel-body">
    <div class="col-md-4">
      <center>{!!Form::label('mostrar',trans('messages.mostrarPor'))!!}
      {!! Form::select('tipo_mostrar', [trans('messages.dia'), trans('messages.semana')],null,['id'=>'tipo_mostrar', 'class' => 'form-control']) !!}</center>
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
    <div id='opciondia' class=" form-group col-md-8">
      <div id="Filtro dia" ><center>
        <div class="col-md-4">
          {!!Form::label('dia_semana',trans('messages.dia'), null, ['class' => 'form-control'])!!}
          {!! Form::select('dia_semana',[trans('messages.lunes'), trans('messages.martes'),trans('messages.miercoles'),trans('messages.jueves'),trans('messages.viernes'),trans('messages.sabado')], $diaSemana,['id'=>'dia_semana', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-5">
          <label>Semana</label>
          {!!Form::select('no_semana_dia', $semanas,$semana,['id'=>'no_semana_dia', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3"><br>
           <input type="button" class="form-control btn btn-primary" value={!! trans('messages.mostrar') !!} onClick="window.location.href='/admin/datasheet/'+$('#tipo_mostrar').val()+'/'+$('#dia_semana').val()+'/'+$('#no_semana_dia').val()">
        </div></center>
      </div>
    </div>
    <div id="opcionsemana" class="form-group col-md-8">
        <div class="col-md-4">
          {!!Form::label('no_sala',trans('messages.numeroSala'))!!}
          {!! Form::select('no_sala', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'],$numeroSala,['id'=>'no_sala', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-5">
          {!!Form::label('no_semana',trans('messages.semana'))!!}
          {!!Form::select('no_semana', $semanas,$semana,['id'=>'no_semana', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3"><br>
          <input type="button" class=" form-control btn btn-primary" value={!! trans('messages.mostrar') !!} onClick="window.location.href='/admin/datasheet/'+$('#tipo_mostrar').val()+'/'+$('#no_sala').val()+'/'+$('#no_semana').val()">
        </div>
    </div>
 </div>
 </div>
 @if (Session::has('message'))
  <div id = 'msg' class="alert alert-success">
  {{ Session::get('message') }}
  </div>
  @endif



 @if($dia)
 <h1></h1>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <center>Seleccionado: {{ $nombre_dia }}</center> 
      </div>
      <div class="panel-body">
        <table data-toggle="table" class="table table-hover">
            <thead class="thead-inverse">
                <tr>
              <th >Hora</th>
              <th>{!! trans('messages.aula1') !!}</th>
              <th>{!! trans('messages.aula2') !!}</th>
              <th>{!! trans('messages.aula3') !!}</th>
              <th>{!! trans('messages.aula4') !!}</th>
              <th>{!! trans('messages.aula5') !!}</th>
              <th>{!! trans('messages.aula6') !!}</th>
              <th>{!! trans('messages.aula7') !!}</th>
              <th>{!! trans('messages.aula8') !!}</th>
              <th>{!! trans('messages.aula9') !!}</th>
              <th>{!! trans('messages.aula10') !!}</th> 
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
         
               
                <td scope="row">{{ $j }} - {{ $j + 1 }} </td>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if(!$dia)
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <center>Seleccionado: Aula: {{ $aula }} del {{ $nombre_dia1 }} al {{ $nombre_dia2 }}</center> 
      </div>
      <div class="panel-body">
        <table data-toggle="table" class="table table-hover">
            <thead class="thead-inverse">
              <tr>
                <th>Hora</th>
                <th>{!! trans('messages.lunes') !!}</th>
                <th>{!! trans('messages.martes') !!}</th>
                <th>{!! trans('messages.miercoles') !!}</th>
                <th>{!! trans('messages.jueves') !!}</th>
                <th>{!! trans('messages.viernes') !!}</th>
                <th>{!! trans('messages.sabado') !!}</th> 
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
                
              <td scope="row">{{ $j }} - {{ $j + 1 }} </td>
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
    </div>
  </div>
</div>

		</div>
		
@stop
