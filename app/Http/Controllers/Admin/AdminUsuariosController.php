<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posteo;

class AdminUsuariosController extends Controller
{
  public function index(){
    $users = User::paginate(10);

    return view('admin.listadoUsuarios')->with('users',$users);
  }

  public function show($id){
    $user = User::find($id);
    $posteos = Posteo::where('user_id',$id)->paginate(10);

    //dd($posteos);
    return view('admin.detalleUsuario',compact('posteos','user'));
  }

  public function search(Request $request){
      $buscar = $request->busqueda;
      $users = User::where('name','like','%'.$buscar.'%')->paginate(10);
      return view('admin.listadoUsuarios')->with('users',$users);

  }
  public function desactivar($id){
    $usuario =  User::find($id);
    $usuario->activo=0;
    $usuario->save();
    return redirect('administrarUsuarios');

  }

  public function activar($id){
    $usuario =  User::find($id);
    $usuario->activo=1;
    $usuario->save();
    return redirect('administrarUsuarios');

  }

}
