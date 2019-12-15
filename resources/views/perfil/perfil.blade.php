@extends('layouts.app')
@section('content')

  <br><br><br><br>
  <div class="container">

   <section class="row  text-center ">
     <article class="col-12  " >
     <h1>Bienvenido: {{Auth::user()->name}}</h1>
     <p>
        <div class="imagen text-center" id="avatar" >
          <img src="{{asset('storage/fotoPerfil/'.Auth::user()->avatar)}}" alt="avatar">
        </div>
     </p>
     <form action="/foto" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
                 <input type="file" class="form-control" name="avatar" id="avatar" value="">
         </div>
         <button type="submit" class="btn btn-primary">Subir foto</button>
     </form>
     </article>

     <div class="misPosteos">
       <h1>Mis Posteos:</h1>
       <div class="spacer">
       <table class="table">
           <thead>
           <tr>
               <th>Comentario</th>
               <th>Track Compartido</th>
               <th>Eliminar</th>

           </tr>
           </thead>
           <tbody>

               @foreach ($misPosteos as $posteo)
                 <tr>
                   <td>{{$posteo->comentario}}</td>
                   <td>@if ($posteo->archivo)
                     <audio controls="controls ">
                       <source class="bg-dark" src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/ogg" />
                       <source src="{{asset('storage/archivos/'.$posteo->archivo)}}" type="audio/mpeg" />
                       </audio>
                     @else {{"No hay archivo"}}
                   @endif</td>
                     <td><a href="/eliminarPosteo/{{$posteo->id}}"><ion-icon name="thumbs-down"></ion-icon></a></td>
                 </tr>
               @endforeach

           </tbody>
       </table>
       <div>
     </div>
   </section>
  </div>

@endsection
