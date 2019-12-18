<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Rutas para Crud Posteos
// Ruta para mostrar posteos solamente de amigos
Route::get('/posteos', 'PosteosController@show')->name('posteos');
// Ruta para crear mis posteos
Route::get('/agregarPosteo', 'PosteosController@create')->name('agregarPosteo');
// Ruta por POST para guardar los posteos, metodo: save
Route::post('/guardarPosteo','PosteosController@save');
// Ruta para buscar posteos de mis amigos
Route::get('/buscarPosteo','PosteosController@search');


// Rutas para el Perfil
// Ruta para acceder a la vista del perfil
Route::get('/perfil', 'PerfilController@show')->name('perfil');
// Ruta para cargar foto de Perfil
Route::post('/foto', 'PerfilController@save');
// Ruta para eliminar posteos propios
Route::get('/eliminarPosteo/{id}', 'PosteosController@destroy')->name('eliminarPosteo');
// Ruta para solicitar Amistad
Route::get('/solicitarAmistad/{id}', 'PerfilController@solicitarAmistad');
// Ruta para aceptar Amistad
Route::get('/aceptarAmistad/{id}', 'PerfilController@aceptarAmistad');



// Rutas para formulario de contacto
// Ruta para acceder a formulario de contacto
Route::get('/contacto', 'ContactoController@index')->name('contacto');
// Ruta para enviar mensaje de contacto
//Route::post('/enviarMensaje', 'ContactoController@enviar');
Route::post('enviarMensaje', ['as'=>'contactus.store','uses'=>'ContactoController@save']);



// Rutas para la administracion de la pagina: Posteos y Usuarios
Route::get('/administrarPosteos', 'AdminPosteosController@index')->name('administrarPosteos');

Route::get('/detallePosteo/{id}','AdminPosteosController@show')->name('detallePosteo');

Route::get('/administrarUsuarios', 'AdminUsuariosController@index')->name('administrarUsuarios');

Route::get('/detalleUsuario/{id}','AdminUsuariosController@show');

//Ruta para buscar posteos por Administrador
Route::get('/buscarPosteoAdmin','AdminPosteosController@search');

//Ruta para buscar usuarios por Administrador
Route::get('/buscarUsuario','AdminUsuariosController@search');

//Ruta para desactivar un posteo por Administrador
Route::get('/desactivarPosteo/{id}','AdminPosteosController@desactivar');

//Ruta para activar un posteo por Administrador
Route::get('/activarPosteo/{id}','AdminPosteosController@activar');

//Ruta para desactivar un usuario por Administrador
Route::get('/desactivarUsuario/{id}','AdminUsuariosController@desactivar');

//Ruta para activar un usuario por Administrador
Route::get('/activarUsuario/{id}','AdminUsuariosController@activar');
