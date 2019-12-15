@extends('layouts.app')
@section('content')
<h2 class="text-center">Detalles del Posteo:</h2>
<div class="row mt-5">
    <div class="col-lg-4 offset-lg-4">
        <div class="card w-100">
            <ul class="list-group list-group-flush">
            <li class="list-group-item ">Comentario: {{$posteo->comentario}}</li>
            <li class="list-group-item ">Archivo: @if ($posteo->archivo)
                  <audio controls="controls ">
                    <source class="bg-dark" src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/ogg" />
                    <source src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/mpeg" />
                    </audio>
                  @else {{"No hay archivo"}}
            @endif</li>
            <li class="list-group-item ">Fecha y Hora: {{$posteo->created_at}}</li>


                <li class="list-group-item">Usuario:
                                                      <ul>
                                                        <li>{{"Nombre: ".$users->name}}</li>
                                                        <li>{{"Email: ".$users->email}}</li>
                                                        <li>{{"ID: ".$users->id}}</li>
                                                        <li></li>
                                                      </ul>
                                                    </li>

            </ul>

        </div>
        <a href="/administrarPosteos" class="btn btn-danger">Volver</a>
    </div>

</div>

@endsection
