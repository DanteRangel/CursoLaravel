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

//Route::get('User','UsuariosController@index');
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
	Route::resource('User','UsuariosController');
	Route::resource('Marca','MarcaController');
	Route::resource('Grupo','GrupoController');
	Route::resource('Empresa','EmpresaController');

	Route::resource('Producto','ProductController');
	Route::resource('Direccion','DireccionController');
});

Route::get('/Sesiones',function(){
	return Session::all();
}); 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contra/{contra}',function($contra='123'){
	return bcrypt($contra);
});