@extends('layouts.admin')

@section('content')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
 @if($dia)
<table class="table table-hover">
    <thead class="thead-inverse">
        <tr>
      <th>#</th>
      <td>Aula 1</td>
      <td>Aula 2</td>
      <td>Aula 3</td>
      <td>Aula 4</td>
      <td>Aula 5</td>
      <td>Aula 6</td>
      <td>Aula 7</td>
      <td>Aula 8</td>
      <td>Aula 9</td>
      <td>Aula 10</td> 
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
    

<input type="button" value="Reservar" onClick="window.location.href='/admin/reserva/{{ $i }}/{{ $j }}/{{ $fecha }}' ">



  </td>
@endif
@endfor
        </tr>
            
            @endfor
           
        
    </tbody>
</table>
@endif
 @if(!$dia)
<table class="table table-hover">
    <thead class="thead-inverse">
      <tr>
      <th>#</th>
      <td>Lunes</td>
      <td>Martes</td>
      <td>Miercoles</td>
      <td>Jueves</td>
      <td>Viernes</td>
      <td>Sabado</td> 
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
<input type="button" value="Reservar" onClick="window.location.href='/admin/reserva/{{ $aula }}/{{ $j }}/{{ date ("Y-m-d", strtotime("+".$i." day", strtotime($fecha))) }}' ">



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
