<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Comuna;
use App\Departamento;
use App\Municipio;
use App\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::paginate(10);
        return view('admin.puestos.index', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.puestos.create', compact('barrios', 'comunas', 'municipios', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto = new Puesto();
        $puesto->nombre = $request->get('nombre');
        $puesto->barrio_id = $request->get('barrio_id');
        $puesto->comuna_id = $request->get('comuna_id');
        $puesto->departamento_id = $request->get('departamento_id');
        $puesto->municipio_id = $request->get('municipio_id');
        $puesto->save();

        return redirect()->route('admin.puestos.index')->with(['success' => 'Puesto creado correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        $barrios = Barrio::all()->pluck('nombre', 'id');
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.puestos.edit', compact('puesto', 'barrios', 'comunas', 'municipios', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        $puesto->nombre = $request->get('nombre');
        $puesto->barrio_id = $request->get('barrio_id');
        $puesto->comuna_id = $request->get('comuna_id');
        $puesto->departamento_id = $request->get('departamento_id');
        $puesto->municipio_id = $request->get('municipio_id');
        $puesto->save();

        return redirect()->route('admin.puestos.index')->with(['success' => 'Puesto editado correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        //
    }
}
