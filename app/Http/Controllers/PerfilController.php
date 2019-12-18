<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posteo;
use App\User;
use App\Amigo;
use Auth;

class PerfilController extends Controller
{
    //

    public function show()
    {
        // Ver todos los Usuarios Activos salvo el mio
        $users=User::paginate(10)->where('activo',1)->where('id','<>',Auth::user()->id);
        // Ver mis Posteos
        $misPosteos = Auth::user()->posteos()->active()->get();
        //Ver mis Amigos Activos
        $misAmigos = Auth::user()->amigos()->active()->where('status',1)->get();

        //Ver solicitudes de amistad recibidas
        $solicitudAmistad = Auth::user()->amigos()->active()->where('status',0)->get();



        return view('perfil.perfil',compact('misPosteos','users','misAmigos','solicitudAmistad'));
    }

    public function save(Request $request)
    {
        //  Reglas de la validación
        // Ayuda de Laraveles.com sobre las reglas de validación https://docs.laraveles.com/docs/5.5/validation#available-validation-rules
        $reglas = [
            'avatar' => 'image',

        ];
        //Ahora debo disponer los mensajes en base a las reglas señaladas por cada campo
        $mensajes = [
            'image' => 'Ingrese en este campo :attribute una foto...',
        ];

        //Laravel nos ofrece un método para validar al cual le debo pasar los datos del formulario, mas las reglas y los mensajes
        $this->validate($request,$reglas,$mensajes);

		    // Obtengo el archivo que viene en el formulario (Objeto de Laravel)
		    $avatar = $request->file('avatar'); // El value del atributo name del input file

		if ($avatar) {
			// Armo un nombre único para este archivo
			$avatarFinal = uniqid("foto_") . "." . $avatar->extension();

			// Subo el archivo en la carpeta elegida
			$avatar->storePubliclyAs("public/fotoPerfil", $avatarFinal);

			// // Le asigno al usuario logueado la foto que guardamos
      $miUsuario = Auth::user();
      $miUsuario->avatar = $avatarFinal;

      //Invoco al método save para guardar el avatar
      $miUsuario->save();
		}



        return  redirect('perfil');
    }

    public function solicitarAmistad($id)
    {
      Auth::user()->amigos()->attach($id);

      return redirect('perfil');
    }

    public function aceptarAmistad($idSolicitante){

      Auth::user()->amigos()->where('amigo_id',$idSolicitante)->update(['status'=>'1']);


      return  redirect('perfil');
    }

    public function eliminarAmistad($idEliminado){

      Auth::user()->amigos()->where('amigo_id',$idEliminado)->update(['status'=>'0']);


      return  redirect('perfil');
    }
}
