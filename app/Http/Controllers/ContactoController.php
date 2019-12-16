<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posteo;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.contacto');
    }

    public function save(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
          ],[
            'required' => 'Este campo :attribute es obligatorio...',
            'email' => 'Ingrese en este campo :attribute un email...'
          ]);

      $contacto = new ContactoController($request->all());
      $contacto->save();

      return back()->with('success', 'Gracias por Contactarnos!');

    }


}
