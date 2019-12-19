@extends('layouts.master')
@section('contenido')
    <br>
    <br>
    <h2 class="text-center">Listado de Posteos</h2>
    <div>
    <form action="/buscarPosteoAdmin" method="GET">

        <input type="submit" value="Buscar"><input type="text" name="busqueda">
    </form>
    </div>

    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Comentario</th>
            <th>Archivo</th>
            <th>Usuario</th>
            <th>Activo</th>
            <th>Ver</th>
            <th>Activar</th>
            <th>Desactivar</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($posteos as $key => $value)
              <tr>
                <td>{{$value->comentario}}</td>
                <td>@if ($value->archivo)
                  <audio controls="controls ">
                    <source class="bg-dark" src="{{asset('storage/archivos/'.$value->archivo)}}" type="audio/ogg" />
                    <source src="{{asset('storage/archivos/'.$value->archivo)}}" type="audio/mpeg" />
                    </audio>
                  @else {{"No hay archivo"}}
                @endif</td>
                <td>{{$value->user->name}}</td>
                <td>@if ($value->activo==1)
                      {{ "Si"}}
                    @else {{ "No"}}
                    @endif</td>
                <td><a href="/detallePosteo/{{$value->id}}"><ion-icon name="eye"></ion-icon></a></td>
                <td><a href="/activarPosteo/{{$value->id}}"><ion-icon name="thumbs-up"></ion-icon></a></td>
                <td><a href="/desactivarPosteo/{{$value->id}}"><ion-icon name="thumbs-down"></ion-icon></a></td>
              </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{$posteos->links()}}
    </div>

    </div>

@endsection
