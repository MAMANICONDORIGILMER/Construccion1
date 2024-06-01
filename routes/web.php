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

use Illuminate\Http\Request; 

//Auth
Route::get('/', 'Auth\LoginController@FrmLogin')->middleware('guest');
Route::post('login', 'Auth\LoginController@Login');
Route::get('recuperar', 'Auth\ForgotPasswordController@FrmRecuperar');
Route::post('recuperar/{UsuarioId}', 'Auth\ForgotPasswordController@ActRecuperar');
Route::post('recuperar/ver/{UsuarioId}', 'Auth\ForgotPasswordController@ActRecuperar');

//start middleware
Route::middleware('Administrador')->group(function(){

Route::get('logout', 'Auth\LoginController@Logout');
Route::get('dashboard', 'ProyectoController@Index');
Route::get('compartidos', 'ProyectoController@Compartidos');
Route::get('favoritos', 'ProyectoController@Favoritos');
Route::get('papelera', 'ProyectoController@Papelera');
Route::get('f{ProyectoId}{Estado}', 'ProyectoController@AddFavoritos');
Route::get('p{ProyectoId}{Estado}', 'ProyectoController@AddPapelera');
Route::get('n{ProyectoId}{Estado}', 'ProyectoController@NormalProyect');

//Metodologia
Route::prefix('metodologia')->group(function () {
    Route::get('/listar', 'MetodologiaController@Listar');
    Route::get('/agregar', 'MetodologiaController@FrmAgregar');
    Route::get('/editar/{MetodologiaId}', 'MetodologiaController@FrmEditar');
    Route::post('/agregar', 'MetodologiaController@ActAgregar');
    Route::post('/editar', 'MetodologiaController@ActEditar');
    Route::get('/ver/{MetodologiaId}', 'MetodologiaController@Ver');
    Route::get('/eliminar/{MetodologiaId}', 'MetodologiaController@ActEliminar');
});

//Usuario
Route::prefix('usuario')->group(function () {
    Route::get('/listar', 'UsuarioController@Listar');
    Route::get('/agregar', 'UsuarioController@FrmAgregar');
    Route::get('/editar/{UsuarioId}', 'UsuarioController@FrmEditar');
    Route::post('/agregar', 'UsuarioController@ActAgregar');
    Route::post('/editar', 'UsuarioController@ActEditar');
});

//Perfil
Route::prefix('perfil')->group(function () {
    Route::get('/{UsuarioId}', 'UsuarioController@FrmPerfil');
});

//Proyecto
Route::prefix('proyecto')->group(function () {
    Route::get('/agregar', 'ProyectoController@FrmAgregar');
    Route::get('/{ProyectoId}', 'ProyectoController@Ver');
    Route::get('/{ProyectoId}/{CarpetaId}', 'ProyectoController@Ver');
    Route::post('/editarEstado', 'ProyectoController@EditarEstado');
});

Route::get('/c/{Entrada}', 'ProyectoController@ConsultarChatbot');

});
//end middleware
?>