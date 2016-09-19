@extends('layouts.admin')

@section('content')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<table class="table">
    <thead>
        <tr>
          
        </tr>
    </thead>
    <tbody>
    @for ($i = 1; $i <=10; $i++)
    	{{-- expr --}}
    
        <tr>
@for ($j = 7; $j < 22; $j++)
	{{-- expr --}}

      @foreach ($clases_today as $element)
     @if (($element -> hora_inicio == $j) && ($element -> id == $i))
     	 <td>{{ $element -> nombre }}</td>
    @else
 
     @endif
      @endforeach

@endfor
        </tr>
            
            @endfor
           
        
    </tbody>
</table>

		</div>
		
@stop