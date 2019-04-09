<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Departamento;
use App\Municipio;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = Comuna::paginate(10);
        return view('admin.comunas.index', compact('comunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        return view('admin.comunas.create', compact('departamentos', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna->nombre =  $request->get('nombre');
        $comuna->departamento_id =  $request->get('departamento_id');
        $comuna->municipio_id =  $request->get('municipio_id');
        $comuna->comuna_lat =  $request->get('comuna_lat');
        $comuna->comuna_long =  $request->get('comuna_long');
        $comuna->save();

        return redirect()->route('admin.comunas.index')->with(['success' => 'Comuna creada correctamente!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function show(Comuna $comuna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Comuna $comuna)
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        return view('admin.comunas.edit', compact('comuna', 'departamentos', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comuna $comuna)
    {
        $comuna->nombre =  $request->get('nombre');
        $comuna->departamento_id =  $request->get('departamento_id');
        $comuna->municipio_id =  $request->get('municipio_id');
        $comuna->comuna_lat =  $request->get('comuna_lat');
        $comuna->comuna_long =  $request->get('comuna_long');
        $comuna->save();

        return redirect()->route('admin.comunas.index')->with(['success' => 'Comuna editada correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comuna $comuna)
    {
        //
    }
}
