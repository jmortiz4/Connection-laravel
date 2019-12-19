@extends('layouts.master')
@section('contenido')

  <br><br><br><br>
  <div class="container">
<div class="form-goup">
   <section class=" row  text-center ">
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
         <button type="submit" class="btn btn-outline-light">Subir foto</button>
     </form>
     </article>
     </section>

     <div class="misPosteos ">
       <h2>Mis Posteos:</h2>
       <div class="spacer ">
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
                     <td><a href="/eliminarPosteo/{{$posteo->id}}"><ion-icon name="trash"></ion-icon></a></td>
                 </tr>
               @endforeach

               </tbody>
           </table>
      </div>
      </div>

      <div class="misAmigos">
         <h2>Mis Amigos:</h2>
         <div class="spacer">
         <table class="table">
             <thead>
             <tr>
                 <th>Avatar</th>
                 <th>Nombre</th>
                 <th>Email</th>
                 <th>Eliminar Amistad</th>

             </tr>
             </thead>
             <tbody>

                 @foreach ($misAmigos as $user)
                   <tr>
                     <td><div class=""><img width="40px" style="border-radius:40%" src="{{asset('storage/fotoPerfil/'.$user->avatar)}}"></div> </td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                       <td><a href="/eliminarAmistad/{{$user->id}}"><ion-icon name="thumbs-down"></ion-icon></a></td>
                   </tr>
                 @endforeach

             </tbody>
         </table>
     </section>
    </div>
    </div>


      <div class="posiblesAmigos">
         <h2>Buscar Amigos:</h2>
         <div class="spacer">
         <table class="table">
             <thead>
             <tr>
                 <th>Avatar</th>
                 <th>Nombre</th>
                 <th>Email</th>
                 <th>Solicitud Amistad</th>

             </tr>
             </thead>
             <tbody>

                 @foreach ($users as $user)
                   <tr>
                     <td><div class=""><img width="40px" style="border-radius:40%" src="{{asset('storage/fotoPerfil/'.$user->avatar)}}"></div> </td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                       <td><a href="/solicitarAmistad/{{$user->id}}"><ion-icon name="thumbs-up"></ion-icon></a></td>
                   </tr>
                 @endforeach

             </tbody>
         </table>
     </section>
    </div>
    </div>

    <div class="solicitudAmistad">
       <h2>Solicitudes de Amistad:</h2>
       <div class="spacer">
       <table class="table">
           <thead>
           <tr>
               <th>Avatar</th>
               <th>Nombre</th>
               <th>Email</th>
               <th>Aceptar Amistad</th>

           </tr>
           </thead>
           <tbody>

               @foreach ($solicitudAmistad as $user)
                 <tr>
                   <td><div class=""><img width="40px" style="border-radius:40%" src="{{asset('storage/fotoPerfil/'.$user->avatar)}}"></div> </td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                     <td><a href="/aceptarAmistad/{{$user->id}}"><ion-icon name="thumbs-up"></ion-icon></a></td>
                 </tr>
               @endforeach

           </tbody>
       </table>
   </section>
  </div>
  </div>
</div>
@endsection
