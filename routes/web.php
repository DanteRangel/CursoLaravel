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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/holaMundo',function(){
	return "Hola Mundo";
});
Route::match(['post','get'],'/dos',function(){
	return "Entrando por post o por get con match";
});
Route::get('/hola/{nombre}',function($nombre){
	return "Hola ".$nombre;
});
Route::get('/hola2/{nombre?}',function($nombre="Invitado"){
	return "Hola ".$nombre;
});
Route::get('/calculadora/{operacion}/{numero1}/{numero2}',function($operacion,$numero1,$numero2){
	switch ($operacion) {
		case 'suma':
				return "La suma es : ".((int)$numero1+(int)$numero2);
		break;
		case "resta":
				return "La resta es : ".($numero1-$numero2);
		break;
		case "multiplicacion":
				return "La multiplucación es : ".($numero1*$numero2);
		break;		
		case "division":
				return "La división es : ".($numero1/$numero2);
		break;		
		default:
			return "Datos no encontrados";
			break;
	}
});
Route::get('view',function(){
	return view('holaMundo',['mensaje'=>"Hola este es un mensaje"]);
});
Route::get('/template',function(){
	return view('olakase',['usuarios'=>Cotizador\Usuario::all()]);
});

Route::get('usuarios',function(){
	return Cotizador\Usuario::all();
});
//Route::get('User','UsuariosController@index');
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
		
	Route::resource('User','UsuariosController');
	Route::resource('Marca','MarcaController');
});



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Sesiones',function(){
	return Session::all();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
