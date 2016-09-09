@extends('index')
@section('content')
<div class="col-md-7 col-md-offset-1">
@if (Session::has('message-error'))
    <div class="alert alert-success">
  {{ Session::get('message-error') }}
</div>
@endif


    <h1>Gestao</h1>
    <h2>Ingresa administrador:</h2>
     {!! Form::open(['route'=>'login.store','method'=>'POST']) !!}
     <div class="form-group">
     {!! Form::label('correo','Correo:') !!}
     {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu correo','required']) !!}
     </div>
     <div class="form-group">
     {!! Form::label('contrasena','Contraseña:') !!}
     {!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu contraseña','required']) !!}
     </div>
     {!! Form::submit('Iniciar',['class='=>'btn btn-primary']) !!}
     {!! Form::close() !!} 
</div>
@stop