@extends('index')
@section('content')
<div class="col-md-7 col-md-offset-1">
@if (Session::has('message-error'))
    <div class="alert alert-success">
  {{ Session::get('message-error') }}
</div>
@endif


    <h1>{{  trans('messages.GESTAO')}}</h1>
    <h2>{{  trans('messages.ingresaAdministrador')}}</h2>
     {!! Form::open(['route'=>'login.store','method'=>'POST']) !!}
     <div class="form-group">
     {!! Form::label('correo',trans('messages.correo')) !!}
     {!! Form::email('email',null,['class'=>'form-control','placeholder'=>trans('messages.ingresaCorreo'),'required']) !!}
     </div>
     <div class="form-group">
     {!! Form::label('contrasena',trans('messages.contrasena')) !!}
     {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('messages.ingresaContrasena'),'required']) !!}
     </div>
     {!! Form::submit(trans('messages.iniciar'),['class='=>'btn btn-primary']) !!}
     {!! Form::close() !!} 
</div>
@stop