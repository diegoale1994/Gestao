@extends('index')
@section('content')

@if (Session::has('message-error'))<div class="col-md-7 col-md-offset-1">
    <div class="alert alert-success"></div>
  {{ Session::get('message-error') }}
</div>
@endif


    <!--<div class="col-md-12"><h1>{{  trans('messages.GESTAO')}}</h1></div>-->
     <div class="col-md-4"><h2>Ingresar<!--{{  trans('messages.ingresaAdministrador')}}--></h2></div>
     {!! Form::open(['route'=>'login.store','method'=>'POST']) !!}
     <div class="col-md-3">
     {!! Form::label('correo',trans('messages.correo')) !!}
     {!! Form::email('email',null,['class'=>'form-control','placeholder'=>trans('messages.ingresaCorreo'),'required']) !!}
     </div>
     <div class="col-md-3">
     {!! Form::label('contrasena',trans('messages.contrasena')) !!}
     {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('messages.ingresaContrasena'),'required']) !!}
     </div>
     <div class="col-md-2"><br>
     {!!Form::submit(trans('messages.iniciar'),['class'=>'btn btn-success btn-block'])!!}</div>
     {!! Form::close() !!} 
</div>
@stop