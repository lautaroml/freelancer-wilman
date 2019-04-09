<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Comuna;
use App\Departamento;
use App\Municipio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrios = Barrio::paginate(10);
        return view('admin.barrios.index', compact('barrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.barrios.create', compact('comunas', 'municipios', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barrio = new Barrio();
        $barrio->nombre = $request->get('nombre');
        $barrio->comuna_id = $request->get('comuna_id');
        $barrio->departamento_id = $request->get('departamento_id');
        $barrio->municipio_id = $request->get('municipio_id');
        $barrio->save();

        return redirect()->route('admin.barrios.index')->with(['success' => 'Barrio creado correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show(Barrio $barrio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrio $barrio)
    {
        $comunas = Comuna::all()->pluck('nombre', 'id');
        $municipios = Municipio::all()->pluck('nombre', 'id');
        $departamentos = Departamento::all()->pluck('nombre', 'id');
        return view('admin.barrios.edit', compact('barrio', 'comunas', 'municipios', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrio $barrio)
    {
        $barrio->nombre = $request->get('nombre');
        $barrio->comuna_id = $request->get('comuna_id');
        $barrio->departamento_id = $request->get('departamento_id');
        $barrio->municipio_id = $request->get('municipio_id');
        $barrio->save();

        return redirect()->route('admin.barrios.index')->with(['success' => 'Barrio editado correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrio $barrio)
    {
        //
    }
}
