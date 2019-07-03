<?php

use App\Models\Libro;

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
    return view('welcome',['libros'=> Libro::where('stock', '>',0)->get()]);
});

//Auth::routes(['register' => false]);
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');





Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin', 'HomeController@index')->name('admin');
	Route::resource('carreras', 'Admin\CarreraController');
	//Route::resource('usuarios', 'Admin\UserController');
	Route::get('usuarios','Admin\UserController@index')->name('usuarios.index');
	Route::get('usuarios/create', 'Admin\UserController@create')->name('usuarios.create');
	Route::post('usuarios', 'Auth\RegisterController@register')->name('usuarios.store');
	Route::get('usuarios/{usuario}/edit', 'Admin\UserController@edit')->name('usuarios.edit');
	Route::put('usuarios/{usuario}', 'Admin\UserController@update')->name('usuarios.update');
	Route::delete('usuarios/{usuario}', 'Admin\UserController@destroy')->name('usuarios.destroy');

	Route::get('consultas','Admin\ConsultaController@index')->name('consultas.index');

	Route::resource('alumnos', 'Admin\AlumnoController');
	Route::resource('libros', 'Admin\LibroController');
	Route::put('prestamos/devolver/{prestamo}','Admin\PrestamoController@devolver')->name('prestamos.devolver');
	Route::resource('prestamos', 'Admin\PrestamoController');
});
