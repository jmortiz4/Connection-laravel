@extends('layouts.app')
@section('content')
  <br>
  <br>
    <h2 class="text-center">Listado de Posteos</h2>
    <div>
    <form action="/buscarPosteo" method="GET">

        <input type="submit" value="Buscar Posteo"><input type="text" name="busqueda">
    </form>
    </div>
    <div class="">
      <button type="button" name="button"><a href="/agregarPosteo" class="btn btn">Postear</a></button>

    </div>

    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Avatar</th>
            <th>Usuario</th>
            <th>Comentario</th>
            <th>Track Compartido</th>

        </tr>
        </thead>
        <tbody>

            @foreach ($posteos as $posteo)
              <tr>
                <td><div class=""><img width="40px" style="border-radius:40%" src="{{asset('storage/fotoPerfil/'.$posteo->user->avatar)}}"></div> </td>
                <td>{{$posteo->user->name}}</td>
                <td>{{$posteo->comentario}}</td>
                <td>@if ($posteo->archivo)
                  <audio controls="controls ">
                    <source class="bg-dark" src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/ogg" />
                    <source src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/mpeg" />
                    </audio>
                  @else {{"No hay archivo"}}
                @endif</td>
              </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    </div>
    </div>

@endsection
