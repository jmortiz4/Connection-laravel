@extends('layouts.app')
@section('content')
  <br>
  <br>
    <h2 class="text-center">Listado de Usuarios</h2>
    <div>
    <form action="/buscarUsuario" method="GET">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
    </form>
    </div>

    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Activo</th>
            <th>Ver</th>
            <th>Activar</th>
            <th>Desactivar</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($users as $key => $value)
                <tr>
                <td>{{($value->name)}}</td>
                <td>{{$value->email}}</td>
                <td>@if ($value->activo==1)
                      {{ "Si"}}
                    @else {{ "No"}}
                    @endif</td>
                <td><a href="/detalleUsuario/{{$value->id}}"><ion-icon name="eye"></ion-icon></a></td>
                <td><a href="/activarUsuario/{{$value->id}}"><ion-icon name="thumbs-up"></ion-icon></a></td>
                <td><a href="/desactivarUsuario/{{$value->id}}"><ion-icon name="thumbs-down"></ion-icon></td></a>
                </tr>

            @endforeach

        </tbody>
    </table>
    <div>
        {{$users->links()}}
    </div>

    </div>

@endsection
