<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posteo;
use App\User;
use Auth;


class PosteosController extends Controller
{




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posteos.agregarPosteo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        //  Reglas de la validación
        // Ayuda de Laraveles.com sobre las reglas de validación https://docs.laraveles.com/docs/5.5/validation#available-validation-rules
        $reglas = [
            'comentario'=> 'required',
            'archivo' => 'file',

        ];
        //Ahora debo disponer los mensajes en base a las reglas señaladas por cada campo
        $mensajes = [
            'comentario.required' => 'Este campo :attribute es requerido...',
            'required' => 'Este campo :attribute es requerido...',
            'file' => 'Ingrese en este campo :attribute un archivo...',
        ];

        //Laravel nos ofrece un método para validar al cual le debo pasar los datos del formulario, mas las reglas y los mensajes
        $this->validate($request,$reglas,$mensajes);
        //Aquí creo el objeto película con los datos del formulario
        $posteo = new Posteo($request->all());
		    // Obtengo el archivo que viene en el formulario (Objeto de Laravel)
		    $track = $request->file('archivo'); // El value del atributo name del input file

		if ($track) {
			// Armo un nombre único para este archivo
			$trackFinal = uniqid("track_") . "." . $track->extension();

			// Subo el archivo en la carpeta elegida
			$track->storePubliclyAs("public/archivos", $trackFinal);

			// Le asigno el track al posteo que guardamos
			$posteo->archivo= $trackFinal;
		}
      $posteo->user_id= Auth::user()->id;
        //Invoco al método save para guardar el posteo
        $posteo->save();
        return  redirect('posteos');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $id= Auth::user()->id;

        // Ver Posteos de Amigos Activos.
        $idsAmigos = auth()->user()->amigos->pluck('id');

        $posteos = Posteo::whereIn('user_id', $idsAmigos)->paginate(10);

        return view('posteos.listadoPosteos',compact('posteos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posteos.editarPosteos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $posteo =  Posteo::find($id);
      $posteo->activo=0;
      $posteo->save();
      return redirect('perfil');

    }



    public function search(Request $request){
        $buscar = $request->busqueda;
        $posteos = Posteo::where('comentario','like','%'.$buscar.'%')->paginate(10);
        return view('posteos.listadoPosteos')->with('posteos',$posteos);

    }
}
