@extends('layouts.master')
@section('contenido')


 <div class="videos">
     <video class="video-fluid " autoplay loop muted>
      <source src="video/video pagina 4.mp4" type="video/mp4" />
    </video>
</div>
<div class="jmo_container ">
<br><br><br><br>
<div class="marco clearfix">

  @if(Session::has('success'))
  <div class="alert alert-success " >
    {{ Session::get('success') }}
  </div>
@endif
{!! Form::open(['route'=>'contactus.store']) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
{!! Form::label('Name:') !!}
{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
{!! Form::label('Email:') !!}
{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
<span class="text-danger">{{ $errors->first('email') }}</span>
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
{!! Form::label('Message:') !!}
{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Deja un Comentario']) !!}
<span class="text-danger">{{ $errors->first('message') }}</span>
</div>
<div class="form-group">
 <p class="Boton animated">
   <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Enviar</button>
   <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Borrar</button>
 </p></div>
{!! Form::close() !!}
</div>


