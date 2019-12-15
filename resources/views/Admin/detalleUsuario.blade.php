@extends('layouts.app')
@section('content')
<h2 class="text-center">Detalles del Usuario: {{($user->name)}}</h2>
<div class="row mt-5">
    <div class="col-lg-4 offset-lg-4">
        <div class="card w-100">
            <ul class="list-group list-group-flush">
              <li class="list-group-item ">Nombre: {{$user->name}}</li>
              <li class="list-group-item ">Email: {{$user->email}}</li>
              <li class="list-group-item">Posteos:
                <div class="spacer">
                  <table class="table">
                    <thead>
                    <tr>
                        <th>Comentario:</th>
                        <th>Archivo:</th>
                        <th>Fecha y Hora:</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posteos as $posteo)

                            <tr>
                                <td>{{($posteo->comentario)}}</td>
                                <td>@if ($posteo->archivo)
                                  <audio controls="controls ">
                                    <source class="bg-dark" src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/ogg" />
                                    <source src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/mpeg" />
                                    </audio>
                                  @else {{"No hay archivo"}}
                                @endif</td>
                                <td>{{($posteo->created_at)}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        </table>
                      </div>
                      </li>

            </ul>
            <div>
                {{$posteos->links()}}
            </div>

            </div>
            <a href="/administrarUsuarios" class="btn btn-danger">Volver</a>
        </div>

    </div>

</div>

@endsection
