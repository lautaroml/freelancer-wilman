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

//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->prefix('admin')/*->middleware('admin')*/->group(function () {
    Route::view('/home', 'admin/home');
    Route::resource('/users', 'UserController');
    Route::resource('/perfiles', 'PerfilController');
    Route::resource('/departamentos', 'DepartamentoController');
    Route::resource('/municipios', 'MunicipioController');
    Route::resource('/comunas', 'ComunaController');
    Route::resource('/barrios', 'BarrioController');
    Route::resource('/puestos', 'PuestoController');
    Route::resource('/mesas', 'MesaController');
});

Route::name('public.')->prefix('public')/*->middleware('admin')*/->group(function () {
    Route::view('/home', 'public/home');
    Route::resource('/ciudadanos', 'CiudadanoController');
});