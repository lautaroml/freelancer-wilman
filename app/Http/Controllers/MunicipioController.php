<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::paginate(10);
        return view('admin.municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.municipios.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = new Municipio();
        $municipio->nombre = $request->get('nombre');
        $municipio->codigo = $request->get('codigo');
        $municipio->departamento_id = $request->get('departamento_id');
        $municipio->save();

        return redirect()->route('admin.municipios.index')->with(['success' => 'Municipio creado correctamente!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.municipios.edit', compact('municipio', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $municipio->nombre = $request->get('nombre');
        $municipio->codigo = $request->get('codigo');
        $municipio->departamento_id = $request->get('departamento_id');
        $municipio->save();

        return redirect()->route('admin.municipios.index')->with(['success' => 'Municipio editado correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        //
    }
}
