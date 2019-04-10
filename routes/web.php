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

Route::post('ajax/departamentos', function(){
    $departamentos = \App\Departamento::all()->pluck('nombre', 'id');
    return $departamentos->toJson();
});

Route::post('ajax/municipios', function(){
    $municipios = \App\Municipio::where('departamento_id', request()->get('id'))->pluck('nombre', 'id');
    return $municipios->toJson();
});

Route::post('ajax/comunas', function(){
    $comunas = \App\Comuna::where('municipio_id', request()->get('id'))->pluck('nombre', 'id');
    return $comunas->toJson();
});

Route::post('ajax/barrios', function(){
    $barrios = \App\Barrio::where('comuna_id', request()->get('id'))->pluck('nombre', 'id');
    return $barrios->toJson();
});

Route::post('ajax/puestos', function(){
    $puestos = \App\Puesto::where('barrio_id', request()->get('id'))->pluck('nombre', 'id');
    return $puestos->toJson();
});

Route::post('ajax/mesas', function(){
    $mesas = \App\Mesa::where('puesto_id', request()->get('id'))->pluck('nombre', 'id');
    return $mesas->toJson();
});