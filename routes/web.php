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

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/home', 'admin/home')->name('home');;
    Route::resource('/users', 'UserController');
    Route::resource('/perfiles', 'PerfilController');
    Route::resource('/departamentos', 'DepartamentoController');
    Route::resource('/municipios', 'MunicipioController');
    Route::resource('/comunas', 'ComunaController');
    Route::resource('/barrios', 'BarrioController');
    Route::resource('/puestos', 'PuestoController');
    Route::resource('/mesas', 'MesaController');
    Route::resource('/ciudadanos', 'CiudadanoController');

    Route::name('reportes.')->prefix('reportes')->group(function () {
        Route::get('municipios', 'ReportController@municipios')->name('municipios');
        Route::get('comunas', 'ReportController@comunas')->name('comunas');
        Route::get('barrios', 'ReportController@barrios')->name('barrios');
        Route::get('puestos', 'ReportController@puestos')->name('puestos');
        Route::get('mesas', 'ReportController@mesas')->name('mesas');
        Route::get('usuarios', 'ReportController@usuarios')->name('usuarios');
        Route::get('activos', 'ReportController@activos')->name('activos');
    });
});

Route::name('public.')->prefix('public')->middleware('auth')->group(function () {
    Route::view('/home', 'public/home')->name('home');
    Route::resource('/ciudadanos', 'CiudadanoController');
});

Route::middleware(['auth'])->group(function () {
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

    Route::post('foo', function(){
        $ciudadanos = \App\Ciudadano::where('documento', 'like' , '%' . request()->get('val') .'%')->first();
        if ($ciudadanos) {
            return response()->json(['status' => 'error']);
        } else {
            return response()->json(['status' => 'success']);
        }
    });
});
